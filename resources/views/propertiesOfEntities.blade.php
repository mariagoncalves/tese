@extends('layouts.default')
@section('content')
    <h2>{{trans("messages.properties")}}</h2>
    <div ng-controller="propertiesManagmentControllerJs">

        <!-- Table-to-load-the-data Part -->
        <table class="table" ng-init="getEntities()" border = "1px solid">
            <thead>
            <tr>
                <th>{{trans("messages.entity")}}</th>
                <th>ID</th>
                <th>{{trans("messages.property")}}</th>
                <th>{{trans("messages.valueType")}}</th>
                <th>{{trans("messages.formFieldName")}}</th>
                <th>{{trans("messages.formFieldType")}}</th>
                <th>{{trans("messages.unitType")}}</th>
                <th>{{trans("messages.formFieldOrder")}}</th>
                <th>{{trans("messages.formFieldSize")}}</th>
                <th>{{trans("messages.mandatory")}}</th>
                <th>{{trans("messages.state")}}</th>
                <th>{{trans("messages.updated_on")}}</th>
                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">{{trans("messages.addProperties")}}</button></th>
            </tr>
            </thead>
            <tbody>
                <tr ng-repeat="entity in entities">
                    <td> [[ entity.ent_type_names[0].name ]] </td>
                    <td> [[ entity.properties[0].id ]] </td>
                    <td> [[ entity.properties[0].name ]]</td>
                    <td> [[ entity.properties[0].value_type ]] </td>
                    <td> [[ entity.properties[0].form_field_name ]] </td>
                    <td> [[ entity.properties[0].form_field_type ]] </td>
                    <td> [[ entity.properties[0].unit_type_id ]] </td>
                    <td> [[ entity.properties[0].form_field_order ]] </td>
                    <td> [[ entity.properties[0].form_field_size ]] </td>
                    <td> [[ entity.properties[0].mandatory ]] </td>
                    <td> [[ entity.properties[0].state ]] </td>
                    <td> updated </td>
                    <td> boatao </td>
                </tr>
                


                <!-- <tr ng-repeat-start="entity in entities" ng-if="false"></tr>
                <tr ng-repeat="property in entity.properties">
                    <th ng-if="$first" rowspan="[[ entity.properties.length ]]">[[ entity.ent_type_names[0].name ]]</th>
                    <td>[[ property.id ]]</td>
                    <td>[[ property.id ]]</td>
                </tr>
                <tr ng-repeat-end ng-if="false"></tr> --> <!-- entities -->


            <!-- <tr ng-repeat="entity in entities">
                <td>[[ entity.ent_type_names[0].name ]]</td>
                <td>[[ property.id ]]</td>
                <td>ghdhx</td>
                <td>[hjdcghdcgh]</td>
                <td>fgsfgs</td>
                <td>fdgsdg</td>
                <td>dgdfh</td>
                <td>[[ entity.ent_type_names[0].name ]]</td>
                <td>[[ property.id ]]</td>
                <td>ghdhx</td>
                <td>[hjdcghdcgh]</td>
                <td>fgsfgs</td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', entitytype.id)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete">Histórico</button>
                </td> -->
            </tr>

            </tbody>
        </table>

        <!-- Modal (Pop up when detail button clicked) -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">[[form_title]]</h4>
                    </div>
                    <div class="modal-body">
                        <form name="frmUnitTypes" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prop_unit_type_name" name="prop_unit_type_name" placeholder="" value="@]]name]]"
                                           ng-model="propUnitType.language[0].pivot.name" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.contact_number.$invalid && frmUnitTypes.prop_unit_type_name.$touched">Name field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">State:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="active" ng-model="propUnitType.state" required>Active
                                    </label>
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="inactive" ng-model="propUnitType.state" required>Inactive
                                    </label>
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.position.$invalid && frmUnitTypes.position.$touched">State field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Value type:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="active" ng-model="propUnitType.state" required>Text
                                    </label>
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="inactive" ng-model="propUnitType.state" required>Bool
                                    </label>
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.position.$invalid && frmUnitTypes.position.$touched">Type field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Field type:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="active" ng-model="propUnitType.state" required>Text
                                    </label>
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="inactive" ng-model="propUnitType.state" required>TextBox
                                    </label>
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.position.$invalid && frmUnitTypes.position.$touched">Type field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Unit:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="active" ng-model="propUnitType.state" required>Text
                                    </label>
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="inactive" ng-model="propUnitType.state" required>TextBox
                                    </label>
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.position.$invalid && frmUnitTypes.position.$touched">Type field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Field Order</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prop_unit_type_name" name="prop_unit_type_name" placeholder="" value="@]]name]]"
                                           ng-model="propUnitType.language[0].pivot.name" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.contact_number.$invalid && frmUnitTypes.prop_unit_type_name.$touched">Name field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Field size</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="prop_unit_type_name" name="prop_unit_type_name" placeholder="" value="@]]name]]"
                                           ng-model="propUnitType.language[0].pivot.name" ng-required="true">
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.contact_number.$invalid && frmUnitTypes.prop_unit_type_name.$touched">Name field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Mandatory:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="active" ng-model="propUnitType.state" required>Active
                                    </label>
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="prop_unit_type_state" value="inactive" ng-model="propUnitType.state" required>Inactive
                                    </label>
                                    <span class="help-inline"
                                          ng-show="frmUnitTypes.position.$invalid && frmUnitTypes.position.$touched">State field is required</span>
                                </div>
                            </div>




                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmUnitTypes.$invalid">Save changes</button>
                    </div>
                </div>
            </div>
        </div>








    </div>
@stop
@section('footerContent')
    <script src="<?= asset('app/controllers/properties.js') ?>"></script>
@stop