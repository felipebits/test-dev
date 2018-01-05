<div class="panel panel-primary">
    <table class="table table-stripped">
        <div class="panel-heading">
        <thead>
        <tr class="text-center">
            <th class="col-md-2">Id</th>
            <th class="col-md-2">Brand</th>
            <th class="col-md-2">Model</th>
            <th class="col-md-2">Year</th>
            <th class="col-md-2">Edit</th>
            <th class="col-md-2">Delete</th>
        </tr>
        </thead>
        </div>
        <tbody>
        <tr>
            <td ng-bind="list.id"></td>
            <td ng-bind="list.marca.name + ' (' + list.marca.abreviatura + ')'"></td>
            <td ng-bind="list.name"></td>
            <td ng-bind="list.ano"></td>
            <td>
                <label>
                    
                    <input type="checkbox" checked autocomplete="off" ng-model="vm.edit[i]">
                        
                </label>
            </td>
            <td>
                <div class="btn-group" data-toggle="buttons">
                    <button class="btn btn-danger btn-block" ng-click="vm.deleteCar(list.id)">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>