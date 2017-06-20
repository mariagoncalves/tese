/**
 * Created by Guilherme on 14/06/2017.
 */

app.controller('propUnitTypeController', function($scope, $http, API_URL) {

    $scope.propUnitTypes = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];

    $scope.getPropUnitTypes = function(pageNumber) {

        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        //Process_Type
        $http.get('/prop_unit_types/get_unit?page='+pageNumber).then(function(response) {
            $scope.propUnitTypes = response.data.data;
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

    //show modal form
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.id = id;
                $scope.form_title = "Adicionar Novo Tipo de Unidade";
                $scope.propUnitType.language[0].pivot.name = "";
                $scope.propUnitType.state = "";
                break;
            case 'edit':
                $scope.form_title = "Detalhes do Tipo de Unidade";
                $scope.id = id;
                $http.get(API_URL + 'prop_unit_types/get_unit/' + id)
                    .then(function(response) {
                        $scope.propUnitType = response.data;
                    });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    };


    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        var url = API_URL + "Prop_Unit_Type";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id ;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param({'name' : $scope.propUnitType.language[0].pivot.name,
                        'state' : $scope.propUnitType.state,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            console.log(response.data);
            $('#myModal').modal('hide');
            $scope.getPropUnitTypes();
        }).error(function (response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    };
});