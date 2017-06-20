@extends('layouts.default')
@section('content')
    <h2>Tipos de Transacções</h2>
    <div ng-controller="entityTypesController">
        <div growl></div>

        <!-- Table-to-load-the-data Part -->
        <table class="table" ng-init="getEntityTypes()">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Transaction Type</th>
                <th>Entity Type</th>
                <th>Transaction State</th>
                <th>State</th>
                <th>Updated_on</th>
                <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Adicionar Novo Tipo de Transacção</button></th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="entitytype in entitytypes">
                <td>[[ entitytype.id ]]</td>
                <td>[[ entitytype.language[0].pivot.name ]]</td> <!--processtype.pivot.name quando é feito da linguagem para o processtype-->
                <td>[[ entitytype.transactions_type.language[0].pivot.t_name ]]</td>
                <td>[[ entitytype.ent_type.language[0].pivot.name ]]</td>
                <td>[[ entitytype.t_states.language[0].pivot.name ]]</td>
                <td>[[ entitytype.state ]]</td>
                <td>[[ entitytype.updated_on ]]</td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', entitytype.id)">Editar</button>
                    <button class="btn btn-danger btn-xs btn-delete">Histórico</button>
                </td>
            </tr>
            </tbody>
        </table>
        <div>
            <posts-pagination></posts-pagination>
        </div>
        <!-- End of Table-to-load-the-data Part -->
        <!-- Modal (Pop up when detail button clicked) -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">[[form_title]]</h4>
                    </div>
                    <div class="modal-body">
                        <form name="frmTransactionTypes" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="transactiontype_t_name" name="transactiontype_t_name" placeholder=""
                                           ng-model="entitytype.language[0].pivot.name">
                                    <span class="help-inline"
                                          ng-show="frmTransactionTypes.transactiontype_t_name.$invalid && frmTransactionTypes.transactiontype_t_name.$touched">Name field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Transaction Type:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" ng-model="entitytype.transaction_type_id" ng-options="item.id as item.language[0].pivot.t_name for item in transactiontypes">
                                        <option value="">Selecionar Tipo de Transacção</option>
                                    </select>
                                    <span class="help-inline"
                                          ng-show="frmTransactionTypes.language_id.$invalid && frmTransactionTypes.language_id.$touched">State field is required</span>
                                </div>
                                <br>
                                <ul ng-repeat="error in errors">
                                    <li>[[ error[0] ]]</li>
                                </ul>

                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Entity Type:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" ng-model="entitytype.ent_type_id" ng-options="item.id as item.language[0].pivot.name for item in enttypes">
                                        <option value="">Selecionar Tipo de Entidade</option>
                                    </select>
                                    <span class="help-inline"
                                          ng-show="frmTransactionTypes.language_id.$invalid && frmTransactionTypes.language_id.$touched">State field is required</span>
                                </div>
                                <br>
                                <ul ng-repeat="error in errors">
                                    <li>[[ error[0] ]]</li>
                                </ul>

                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">State:</label>
                                <div class="col-sm-9">
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="transactiontype_state" value="active" ng-model="entitytype.state" required>Active
                                    </label>
                                    <label for="" class="radio-inline state">
                                        <input type="radio" name="transactiontype_state" value="inactive" ng-model="entitytype.state" required>Inactive
                                    </label>
                                    <span class="help-inline"
                                          ng-show="frmTransactionTypes.process_state.$invalid && frmTransactionTypes.process_state.$touched">State field is required</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Transaction State:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" ng-model="entitytype.t_state_id" ng-options="item.language[0].pivot.t_state_id as item.language[0].pivot.name for item in tstates">
                                        <option value="">Selecionar Estado de Transacção</option>
                                    </select>
                                    <span class="help-inline"
                                          ng-show="frmTransactionTypes.language_id.$invalid && frmTransactionTypes.language_id.$touched">State field is required</span>
                                </div>
                                <br>
                                <ul ng-repeat="error in errors">
                                    <li>[[ error[0] ]]</li>
                                </ul>

                            </div>

                            <div class="form-group">
                                <label for="Gender" class="col-sm-3 control-label">Language:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" ng-model="entitytype.language[0].id" ng-options="item.id as item.slug for item in langs">
                                        <option value="">Selecionar Idioma</option>
                                    </select>
                                    <span class="help-inline"
                                          ng-show="frmTransactionTypes.language_id.$invalid && frmTransactionTypes.language_id.$touched">State field is required</span>
                                </div>
                                <br>
                                <ul ng-repeat="error in errors">
                                        <li>[[ error[0] ]]</li>
                                </ul>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer"><!-- ng-disabled="frmProcessTypes.$invalid" -->
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" >Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('footerContent')
    <script src="<?= asset('app/controllers/entTypes.js') ?>"></script>
@stop