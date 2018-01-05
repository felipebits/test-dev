<div>
    <validation-form></validation-form>
    <form ng-submit="vm.addCar(carForm.$valid)" name="carForm">
        <div class="form-group">
            <label id="marca"> Brands</label>
            <carro-marca ng-model="vm.params.id_marca" data="vm.marcaList"></carro-marca>
            <label> Nome
                <input type="text" name="name" ng-model="vm.params.name" class="form-control" ng-required="true" ng-minlength="6"/>
            </label>
            <label> Year
                <input type="number" name="ano" ng-model="vm.params.ano" class="form-control"  ng-required="true" ng-minlength="4" ng-maxlength="4"/>
            </label>
        </div>
        <button type="submit" class="btn btn-success">Add car</button>
    </form>
</div>
<br>