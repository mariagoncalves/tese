app.controller('propertiesManagmentControllerJs', function($scope, $http, growl, API_URL) {

	$scope.entities = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];

    $scope.getEntities = function(pageNumber) {

        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        //Properties
        $http.get('/properties/get_props_ents?page='+pageNumber).then(function(response) {
            console.log(response);
            $scope.entities = response.data.data;

            //COMENTADPOOOO
            /*$scope.totalPages = response.data.last_page;
            $scope.currentPage = response.data.current_page;

            // Pagination Range
            var pages = [];

            for (var i = 1; i <= response.data.last_page; i++) {
                pages.push(i);
            }

            $scope.range = pages;*/
            //COMENTADPOOOO FIM

        });
    };

    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.id = id;
                $scope.form_title = "Adicionar Novo Tipo de Transacção";
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


});

