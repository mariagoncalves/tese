/**
 * Created by Guilherme on 15/06/2017.
 */

app.controller('propAllowedValueController', function($scope, $http, API_URL) {

    $scope.propUnitTypes = [];
    $scope.totalPages = 0;
    $scope.currentPage = 1;
    $scope.range = [];

    $scope.getPropAllowedValues = function(pageNumber) {

        if (pageNumber === undefined) {
            pageNumber = '1';
        }
        //Process_Type
        $http.get('/prop_allowed_value/get_unit?page='+pageNumber).then(function(response) {
            $scope.propAllowedValues = response.data.data;
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
                $http.get('/prop_allowed_value/get_properties').then(function(response) {
                    $scope.properties = response.data;
                });
                $scope.id = id;
                $scope.form_title = "Adicionar Novo Valor Permitido";
                break;
            case 'edit':
                $scope.form_title = "Detalhes do Valor Permitido";
                $scope.id = id;
                $scope.properties = "";
                $http.get(API_URL + 'prop_allowed_value/get_unit/' + id)
                    .then(function(response) {
                        $scope.propAllowedValue = response.data;
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
        var url = API_URL + "Prop_Allowed_Value";

        //append employee id to the URL if the form is in edit mode
        if (modalstate === 'edit') {
            url += "/" + id ;
        }

        $http({
            method: 'POST',
            url: url,
            data: $.param({'name' : $scope.propAllowedValue.language[0].pivot.name,
                'state' : $scope.propAllowedValue.state,
                'property_id' : $scope.propAllowedValue.property,
            }),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function (response) {
            console.log(response.data);
            $('#myModal').modal('hide');
            $scope.getPropAllowedValues();
        }).error(function (response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    };

});