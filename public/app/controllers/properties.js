app.controller('propertiesManagmentControllerJs', function($scope, $http, growl, API_URL) {

	$scope.entities = [];
    $scope.states   = [];
    $scope.valueTypes = [];
    $scope.fieldTypes = [];
    $scope.units = [];
    $scope.mandatory = [];
    $scope.relations = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];
    $scope.errors = [];


    //MÉTODOS ENTIDADES

    $scope.getEntities = function(pageNumber) {

        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        $http.get('/properties/get_props_ents?page='+pageNumber).then(function(response) {
            console.log(response);
            $scope.entities = response.data.data;

            $scope.totalPages = response.data.last_page;
            $scope.currentPage = response.data.current_page;

            // Pagination Range
            var pages = [];

            for (var i = 1; i <= response.data.last_page; i++) {
                pages.push(i);
            }

            $scope.range = pages;

        });
    };

    //MÉTODOS RELAÇÕES
    $scope.getRelations = function(pageNumber) {

        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        //Properties
        $http.get('/properties/get_props_rel?page='+pageNumber).then(function(response) {
            console.log(response);
            $scope.relations = response.data.data;

            $scope.totalPages = response.data.last_page;
            $scope.currentPage = response.data.current_page;

            // Pagination Range
            var pages = [];

            for (var i = 1; i <= response.data.last_page; i++) {
                pages.push(i);
            }

            $scope.range = pages;

        });
    };

    $scope.toggle = function(modalstate, id) {

        $scope.modalstate = modalstate;

        if(modalstate == "edit") {
            $('#formProperty')[0].reset();
            $('#myModal select:first').prop('disabled', true);
        } else {
            $('#formProperty')[0].reset();
            $('#myModal select:first').prop('disabled', false);
        }

        switch (modalstate) {
            case 'add':
                $scope.id = id;
                $scope.form_title = "Add New Property";
                break;
            case 'edit':
                $scope.form_title = "Edit Property";
                $scope.id = id;
                $http.get(API_URL + '/properties/get_property/' + id)
                    .then(function(response) {
                        console.log(response);
                        $scope.property = response.data;
                    });
                break;
            default:
                break;
        }
        //console.log(id);
        $('#myModal').modal('show');
        $scope.errors = null;
        $scope.process = null;
    };

    $scope.save = function(modalstate, id) {
        var url      = API_URL + "PropertyEnt";
        var formData = JSON.parse(JSON.stringify(jQuery('#formProperty').serializeArray()));

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id ;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param(formData),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            //First function handles success
            $scope.errors = [];
            $('#myModal').modal('hide');
            $scope.getEntities();
            if(modalstate == "add") {
                growl.success('Property inserted successfully.',{title: 'Success!'});
            } else {
                growl.success('Property edited successfully.',{title: 'Success!'});
            }
        }, function(response) {
            //Second function handles error
            if (response.status == 400) {
                growl.error('This is error message.',{title: 'error!'});
                $scope.errors = response.data.error;
            } else if (response.status == 500) {
                alert(response.data.error);
            }
        });
    };


    $scope.saveRel = function(modalstate, id) {

        var url      = API_URL + "PropertyRel";
        var formData = JSON.parse(JSON.stringify(jQuery('#formPropRel').serializeArray()));

        if (modalstate === 'edit') {
            url += "/" + id ;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param(formData),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(response) {
            //First function handles success
            $scope.errors = [];
            $scope.getRelations();
            $('#myModal').modal('hide');
            $('#myModal select:first').prop('disabled', false);
            $('#formPropRel')[0].reset();
            // Mostrar mensagem de sucesso
            if(modalstate == "add") {
                growl.success('Property inserted successfully.',{title: 'Success!'});
            } else {
                growl.success('Property edited successfully.',{title: 'Success!'});
            }
        }, function(response) {
            //Second function handles error
            if (response.status == 400) {
                $scope.errors = response.data.error;
            } else if (response.status == 500) {
                $('#myModal').modal('hide');
                $('#formPropRel')[0].reset();
                growl.error('Error.', {title: 'error!'});
            }
        });
    };

    $scope.toggleRel = function(modalstate, id) {

        $scope.modalstate = modalstate;

        if(modalstate == "edit") {
            $('#formPropRel')[0].reset();
            $('#myModal select:first').prop('disabled', true);
        } else {
            $('#formPropRel')[0].reset();
            $('#myModal select:first').prop('disabled', false);
        }

        switch (modalstate) {
            case 'add':
                $scope.id = id;
                $scope.form_title = "Add New Property";
                /*$('#formPropRel')[0].reset();*/
                break;
            case 'edit':
                $scope.form_title = "Edit Property";
                $scope.id = id;
                $('#formPropRel')[0].reset();
                $http.get(API_URL + '/properties/get_property/' + id)
                    .then(function(response) {
                        console.log(response);
                        $scope.property = response.data;
                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
        $scope.errors = null;
        $scope.process = null;
    };


    //Métodos comuns

    $scope.getStates = function() {
        //Estado das propriedades
        $http.get('/properties/states').then(function(response) {
            $scope.states = response.data;
            console.log($scope.states);
        });
    };

    $scope.getValueTypes = function() {
        //Buscar value types
        $http.get('/properties/valueTypes').then(function(response) {
            $scope.valueTypes = response.data;
            console.log($scope.valueTypes);
        });
    };

    $scope.getFieldTypes = function() {
        //Buscar fields types
        $http.get('/properties/fieldTypes').then(function(response) {
            $scope.fieldTypes = response.data;
            console.log($scope.fieldTypes);
        });
    };

    $scope.getUnits = function() {

        $http.get('/properties/units').then(function(response) {
            $scope.units = response.data;
            console.log($scope.units);

        });
    };
});

