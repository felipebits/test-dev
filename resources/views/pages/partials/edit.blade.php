
<div class="panel-body" ng-if="vm.edit[i]" ng-show="vm.edit[i]">
    <validation-form></validation-form>
    <form ng-submit="vm.editCar(list.id, i, list)" name="carForm">
        <div class="form-group">
            <label id="marca"> Brand</label>
            <carro-marca ng-model="list.id_marca" data="vm.marcaList"></carro-marca>
            <label> Name
                <input type="text" name="name" ng-model="list.name" class="form-control" ng-required="true" ng-minlength="6"/>
            </label>
            <label> Year
                <input type="number" name="ano" ng-model="list.ano" class="form-control"  ng-required="true" ng-minlength="4" ng-maxlength="4"/>
            </label>
        </div>
        <div class="btn-group">
            <button class="btn btn-success" type="submit">
                Save
            </button>
        </div>
    </form>
</div>
