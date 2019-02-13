@extends('layouts.admin')

@section('formulario')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">INSERTAR NUEVO PRODUCTO</div>

                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf                       

                        <div class="form-group row">
                            <label for="object" class="col-md-4 col-form-label text-md-right">Producto</label>

                            <div class="col-md-6">
                                <input id="object" type="text" class="form-control" name="object" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">Marca</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control" name="brand" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">Modelo</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control" name="model" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="specifications" class="col-md-4 col-form-label text-md-right">Especificaciones</label>

                            <div class="col-md-6">
                                <textarea name="specifications" class="form-control" id="description" cols="30" rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Precio</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="price" id="price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categoryid" class="col-md-4 col-form-label text-md-right">Categoria</label>

                            <div class="col-md-6">
                                <select name="categoryid" class="form-control" id="categoryid">
                                    <option value="1">Informatica</option>
                                    <option value="2">Fotografia</option>
                                    <option value="3">Telefonia</option>
                                    <option value="4">Ocio</option>
                                    <option value="5">Television</option>
                                    <option value="6">Accesorios</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subcategoryid" class="col-md-4 col-form-label text-md-right">Subcategoria</label>

                            <div class="col-md-6">
                                <select name="subcategoryid" class="form-control" id="subcategoryid">
                                    <option value="1">Portatiles</option>
                                    <option value="2">PC de sobremesa</option>
                                    <option value="3">Tablets</option>
                                    <option value="4">Perifericos</option>
                                    <option value="5">Camaras reflex</option>
                                    <option value="6">Camaras evil</option>
                                    <option value="7">Objetivos</option>
                                    <option value="8">Camaras deportivas</option>
                                    <option value="9">Smartphones</option>
                                    <option value="10">Smartwatches</option>
                                    <option value="11">Telfonia doméstica</option>
                                    <option value="12">Videojuegos</option>
                                    <option value="13">Consolas</option>
                                    <option value="14">Televisores</option>
                                    <option value="15">Proyectores</option>
                                    <option value="16">Cables</option>
                                    <option value="17">Cargadores</option>
                                    <option value="18">Audio</option>
                                    <option value="19">Video</option>
                                    <option value="20">Baterias</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="provider" class="col-md-4 col-form-label text-md-right">Proveedor</label>

                            <div class="col-md-6">
                                <select name="providerid" class="form-control" id="providerid">
                                    <option value="1">Proveedor 1</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Imagen</label>

                            <div class="col-md-6">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">Stock</label>

                            <div class="col-md-6">
                                <input type="number" name="stock" class="form-control" id="stock">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taxesid" class="col-md-4 col-form-label text-md-right">Impuesto</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="taxesid" id="taxesid">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary form-control">
                                    Añadir producto
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop