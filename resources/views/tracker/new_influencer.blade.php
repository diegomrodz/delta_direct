@extends('layouts.master')

@section('content')

<form action="http://deltafaucetrep.com/tracker/influencer/new" method="POST">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Nova Pessoa</span>
        </div>

        <div class="panel-body">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Nome:</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Sobrenome:</label>
                    <input type="text" name="surname" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">CPF/CNPJ:</label>
                    <input type="text" name="cpf_cnpj" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Email:</label>
                    <input type="text" name="email" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Website:</label>
                    <input type="text" name="website" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Telefone:</label>
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Telefone 2:</label>
                    <input type="text" name="phone2" class="form-control">
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">Celular:</label>
                    <input type="text" name="cellphone" class="form-control">
                </div>
            </div>
        </div>
        
        {!! csrf_field() !!}
        
        <div class="panel-footer">
            <button id="btn_new_influencer" type="submit" class="btn btn-flat btn-md btn-success"><span class="btn-label icon fa "></span>Registrar</button>
        </div>
    </div>
</form>

@endsection

@section('end')



@endsection