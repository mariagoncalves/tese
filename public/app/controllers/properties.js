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

    //MÉTODOS RELAÇÕES
    $scope.getRelations = function(pageNumber) {

        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        //Properties
        $http.get('/properties/get_props_rel?page='+pageNumber).then(function(response) {
            console.log(response);
            $scope.relations = response.data.data;

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
        var url = API_URL + "PropertyRel";
        //alert('chegou');

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id ;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param({'name' : $scope.property.language[0].pivot.name,
                            'state' : $scope.property.state,
                            'entity_id' : $scope.property.property,
            }),

            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            console.log(response.data);
            $('#myModal').modal('hide');
            $scope.getRelations();
        }).error(function (response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    };


});

