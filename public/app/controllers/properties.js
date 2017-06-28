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
        //Properties
        $http.get('/properties/get_props_ents?page='+pageNumber).then(function(response) {
            console.log(response);
            $scope.entities = response.data.data;

            //COMENTADPOOOO
            $scope.totalPages = response.data.last_page;
            $scope.currentPage = response.data.current_page;

            // Pagination Range
            var pages = [];

            for (var i = 1; i <= response.data.last_page; i++) {
                pages.push(i);
            }

            $scope.range = pages;
            //COMENTADPOOOO FIM

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

        switch (modalstate) {
            case 'add':
                $scope.id = id;
                $scope.form_title = "Adicionar Nova Propriedade";

                break;
            case 'edit':
                $scope.form_title = "Detalhes do Tipo de Transacção";
                $scope.id = id;
                $http.get(API_URL + 'ents_types/get_ents_types/' + id)
                    .then(function(response) {
                        $scope.entitytype = response.data;
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
        }, function(response) {
            //Second function handles error
            if (response.status == 400) {
                $scope.errors = response.data.error;
            } else if (response.status == 500) {
                alert(response.data.error);
            }
        });
    };


    $scope.saveRel = function(modalstate, id) {

        var url      = API_URL + "PropertyRel";
        var formData = JSON.parse(JSON.stringify(jQuery('#formPropRel').serializeArray()));

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
            if(modalstate == "add") {
                growl.success('Property inserted successfully.',{title: 'Success!'});
            } else {
                growl.success('Property edited successfully.',{title: 'Success!'});
            }
            //First function handles success
            $scope.errors = [];
            $('#myModal').modal('hide');
            $('#myModal select:first').prop('disabled', false);
            $('#formPropRel')[0].reset();
            $scope.getRelations();
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
                $scope.form_title = "Adicionar Nova Propriedade";
                break;
            case 'edit':
                $scope.form_title = "Detalhes do Tipo de Transacção";
                $scope.id = id;
                //$('#formPropRel')[0].reset();
                break;
                $http.get(API_URL + '/properties/get_props_rel/' + id)
                    .then(function(response) {
                        $scope.relation = response.data;
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

