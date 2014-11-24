<div class="marketing">
    @if(Session::get("id_mina"))
            <div class="alert alert-success">{{ Session::get("id_mina")}}</div>
        @endif
    {{ Form::open(array("url" => "pestanaMineroPost")) }}
    <p class="bg-primary">Fecha de la Visita</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="txtFecha" class="control-label">fecha en que se realizó la visita</label>
            {{ Form::text("txtFecha", Input::old("txtFecha"), array("class" => "form-control col-xs-12 col-sm-4", "placeholder" => "Fecha Visita", "autocomplete" => "off")) }}
            @if($errors->has("txtFecha"))
                @foreach($errors->get("txtFecha") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            <label for="txtMina" class="control-label">fecha en que se realizó la visita</label>
            {{ Form::text("txtMina", Session::get("id_mina"), Input::old("txtMina"), array("class" => "form-control col-xs-12 col-sm-4", "placeholder" => "Fecha Visita", "autocomplete" => "off")) }}
            @if($errors->has("txtMina"))
                @foreach($errors->get("txtMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Datos Generales del responsable explotación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimer", "Primer Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtPrimer", Input::old("txtPrimer"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Primer Nombre", "autocomplete" => "off")) }}
            @if($errors->has("txtPrimer"))
                @foreach($errors->get("txtPrimer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundo", "Segundo Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtSegundo", Input::old("txtSegundo"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Segundo Nombre", "autocomplete" => "off")) }}
            @if($errors->has("txtSegundo"))
                @foreach($errors->get("txtSegundo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerApe", "Primer Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerApe", Input::old("txtPrimerApe"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Primer Apellido", "autocomplete" => "off")) }}
            @if($errors->has("txtPrimerApe"))
                @foreach($errors->get("txtPrimerApe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoApe", "Segundo Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoApe", Input::old("txtSegundoApe"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Segundo Apellido", "autocomplete" => "off")) }}
            @if($errors->has("txtSegundoApe"))
                @foreach($errors->get("txtSegundoApe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-6">
            {{ Form::label("txtDireccion", "Dirección", array("class" => "control-label")) }}
            {{ Form::text("txtDireccion", Input::old("txtDireccion"), 
                            array("class" => "form-control col-xs-12 col-sm-6", "placeholder" => "Dirección", "autocomplete" => "off")) }}
            @if($errors->has("txtDireccion"))
                @foreach($errors->get("txtDireccion") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selDepto", "Departamento", array("class" => "control-label")) }}
            <select name="selDepto" id="selDepto">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selDepto"))
                @foreach($errors->get("selDepto") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selMunicipio", "Municipio", array("class" => "control-label")) }}
            <select name="selMunicipio" id="selMunicipio">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selMunicipio"))
                @foreach($errors->get("selMunicipio") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selVereda", "Vereda", array("class" => "control-label")) }}
            <select name="selVereda" id="selVereda">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selVereda"))
                @foreach($errors->get("selVereda") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtTelefono", "Teléfono", array("class" => "control-label")) }}
            {{ Form::text("txtTelefono", Input::old("txtTelefono"), 
                            array("class" => "form-control col-xs-12 col-sm-6", "placeholder" => "Teléfono", "autocomplete" => "off")) }}
            @if($errors->has("txtTelefono"))
                @foreach($errors->get("txtTelefono") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif  
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCelular", "Celular", array("class" => "control-label")) }}
            {{ Form::text("txtCelular", Input::old("txtCelular"), 
                            array("class" => "form-control col-xs-12 col-sm-6", "placeholder" => "Celular", "autocomplete" => "off")) }}
            @if($errors->has("txtCelular"))
                @foreach($errors->get("txtCelular") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif  
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCorreo", "Correo", array("class" => "control-label")) }}
            {{ Form::text("txtCorreo", Input::old("txtCorreo"), 
                            array("class" => "form-control col-xs-12 col-sm-6", "placeholder" => "Correo", "autocomplete" => "off")) }}
            @if($errors->has("txtCorreo"))
                @foreach($errors->get("txtCorreo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif  
        </div>
    </div>
    <p class="bg-primary">Datos del Operador Minero</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerOperador", "Primer Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerOperador", Input::old("txtPrimerOperador"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Primer Nombre", "autocomplete" => "off")) }}
            @if($errors->has("txtPrimerOperador"))
                @foreach($errors->get("txtPrimerOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoOperador", "Segundo Nombre", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoOperador", Input::old("txtSegundoOperador"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Segundo Nombre", "autocomplete" => "off")) }}
            @if($errors->has("txtSegundoOperador"))
                @foreach($errors->get("txtSegundoOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrimerApeOperador", "Primer Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtPrimerApeOperador", Input::old("txtPrimerApeOperador"),
                        array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Primer Apellido", "autocomplete" => "off")) }}
            @if($errors->has("txtPrimerApeOperador"))
                @foreach($errors->get("txtPrimerApeOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtSegundoApeOperador", "Segundo Apellido", array("class" => "control-label")) }}
            {{ Form::text("txtSegundoApeOperador", Input::old("txtSegundoApeOperador"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Segundo Apellido", "autocomplete" => "off")) }}
            @if($errors->has("txtSegundoApeOperador"))
                @foreach($errors->get("txtSegundoApeOperador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Datos Generales de la Mina</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtNombreMina", "Nombre de la Mina", array("class" => "control-label")) }}
            {{ Form::text("txtNombreMina", Input::old("txtNombreMina"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Nombre de la Mina", "autocomplete" => "off")) }}
            @if($errors->has("txtNombreMina"))
                @foreach($errors->get("txtNombreMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selDeptoMina", "Departamento", array("class" => "control-label")) }}
            <select name="selDeptoMina" id="selDeptoMina">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selDeptoMina"))
                @foreach($errors->get("selDeptoMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selMunicipioMina", "Municipio", array("class" => "control-label")) }}
            <select name="selMunicipioMina" id="selMunicipioMina">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selMunicipioMina"))
                @foreach($errors->get("selMunicipioMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selVeredaMina", "Vereda", array("class" => "control-label")) }}
            <select name="selVeredaMina" id="selVeredaMina">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selVeredaMina"))
                @foreach($errors->get("selVeredaMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEstadoEtapa", "Estado Actual de la Etapa", array("class" => "control-label")) }}
            {{ Form::text("txtEstadoEtapa", Input::old("txtEstadoEtapa"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Estado de la Etapa", "autocomplete" => "off")) }}
            @if($errors->has("txtEstadoEtapa"))
                @foreach($errors->get("txtEstadoEtapa") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selMineral", "Mineral", array("class" => "control-label")) }}
            <select name="selMineral" id="selMineral">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selMineral"))
                @foreach($errors->get("selMineral") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtArea", 'Área de la Mina en Hectáreas', array("class" => "control-label")) }}
            {{ Form::text("txtArea", Input::old("txtArea"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Área", "autocomplete" => "off")) }}
            @if($errors->has("txtArea"))
                @foreach($errors->get("txtArea") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Ubicación Georeferenciacion del Frente de la Bocamina (coordenas planas)</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selFrente", "Frente o Bocamina", array("class" => "control-label")) }}
            <select name="selFrente" id="selFrente">
                <option value="">Seleccione..</option>
                <option value="Frente">Frente</option>
                <option value="Bocamina">Bocamina</option>
            </select>
            @if($errors->has("selFrente"))
                @foreach($errors->get("selFrente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtNorte", 'Norte (X)', array("class" => "control-label")) }}
            {{ Form::text("txtNorte", Input::old("txtNorte"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Norte", "autocomplete" => "off")) }}
            @if($errors->has("txtNorte"))
                @foreach($errors->get("txtNorte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtEste", 'Este (Y)', array("class" => "control-label")) }}
            {{ Form::text("txtEste", Input::old("txtEste"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Este", "autocomplete" => "off")) }}
            @if($errors->has("txtEste"))
                @foreach($errors->get("txtEste") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtAltura", 'Altura (msnm)', array("class" => "control-label")) }}
            {{ Form::text("txtAltura", Input::old("txtAltura"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Altura", "autocomplete" => "off")) }}
            @if($errors->has("txtAltura"))
                @foreach($errors->get("txtAltura") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEstadoFrente", "Estado", array("class" => "control-label")) }}
            <select name="selEstadoFrente" id="selEstadoFrente">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selEstadoFrente"))
                @foreach($errors->get("selEstadoFrente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtTurnos", 'Turnos/día', array("class" => "control-label")) }}
            {{ Form::text("txtTurnos", Input::old("txtTurnos"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Turnos", "autocomplete" => "off")) }}
            @if($errors->has("txtTurnos"))
                @foreach($errors->get("txtTurnos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtDias", 'Días/Semana', array("class" => "control-label")) }}
            {{ Form::text("txtDias", Input::old("txtDias"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Dias", "autocomplete" => "off")) }}
            @if($errors->has("txtDias"))
                @foreach($errors->get("txtDias") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtHoras", 'Hotas/Turno', array("class" => "control-label")) }}
            {{ Form::text("txtHoras", Input::old("txtHoras"),
                            array("class" => "form-control col-xs-12 col-sm-3", "placeholder" => "Horas", "autocomplete" => "off")) }}
            @if($errors->has("txtHoras"))
                @foreach($errors->get("txtHoras") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsFrente", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsFrente", Input::old("txtObsFrente"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsFrente"))
                @foreach($errors->get("txtObsFrente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Producción Mineral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMineralProd", "Mineral", array("class" => "control-label")) }}
            <select name="selMineralProd" id="selMineralProd">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selMineralProd"))
                @foreach($errors->get("selMineralProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selUnidadProd", "Unidad", array("class" => "control-label")) }}
            <select name="selUnidadProd" id="selUnidadProd">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selUnidadProd"))
                @foreach($errors->get("selUnidadProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCantidad", 'Cantidad', array("class" => "control-label")) }}
            {{ Form::text("txtCantidad", Input::old("txtCantidad"),
                            array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCantidad"))
                @foreach($errors->get("txtCantidad") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selAgnoProd", "Año", array("class" => "control-label")) }}
            <select name="selAgnoProd" id="selAgnoProd">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selAgnoProd"))
                @foreach($errors->get("selAgnoProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMesProd", "Mes", array("class" => "control-label")) }}
            <select name="selMesProd" id="selMesProd">
                <option value="">Seleccione..</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
            </select>
            @if($errors->has("selMesProd"))
                @foreach($errors->get("selMesProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsProd", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsProd", Input::old("txtObsProd"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsProd"))
                @foreach($errors->get("txtObsProd") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Producción Otro Mineral</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMineralProdOtro", "Mineral", array("class" => "control-label")) }}
            <select name="selMineralProdOtro" id="selMineralProdOtro">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selMineralProdOtro"))
                @foreach($errors->get("selMineralProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selUnidadProdOtro", "Unidad", array("class" => "control-label")) }}
            <select name="selUnidadProdOtro" id="selUnidadProdOtro">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selUnidadProdOtro"))
                @foreach($errors->get("selUnidadProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCantidadOtro", 'Cantidad', array("class" => "control-label")) }}
            {{ Form::text("txtCantidadOtro", Input::old("txtCantidadOtro"),
                            array("class" => "form-control", "placeholder" => "Cantidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCantidadOtro"))
                @foreach($errors->get("txtCantidadOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selAgnoProdOtro", "Año", array("class" => "control-label")) }}
            <select name="selAgnoProdOtro" id="selAgnoProdOtro">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selAgnoProdOtro"))
                @foreach($errors->get("selAgnoProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selMesProdOtro", "Mes", array("class" => "control-label")) }}
            <select name="selMesProdOtro" id="selMesProdOtro">
                <option value="">Seleccione..</option>
                <option value="Enero">Enero</option>
                <option value="Febrero">Febrero</option>
                <option value="Marzo">Marzo</option>
                <option value="Abril">Abril</option>
                <option value="Mayo">Mayo</option>
                <option value="Junio">Junio</option>
                <option value="Julio">Julio</option>
                <option value="Agosto">Agosto</option>
                <option value="Septiembre">Septiembre</option>
                <option value="Octubre">Octubre</option>
                <option value="Noviembre">Noviembre</option>
                <option value="Diciembre">Diciembre</option>
            </select>
            @if($errors->has("selMesProdOtro"))
                @foreach($errors->get("selMesProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsProdOtro", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsProdOtro", Input::old("txtObsProdOtro"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsProdOtro"))
                @foreach($errors->get("txtObsProdOtro") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Talento Humano</p>
    <p class="bg-primary">Responsable de Explotación Permanente</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfPer", 'Número de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfPer", Input::old("txtProfPer"),
                            array("class" => "form-control", "placeholder" => "Profesionales", "autocomplete" => "off")) }}
            @if($errors->has("txtProfPer"))
                @foreach($errors->get("txtProfPer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpPer", 'Número de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpPer", Input::old("txtEmpPer"),
                            array("class" => "form-control", "placeholder" => "Empleados", "autocomplete" => "off")) }}
            @if($errors->has("txtEmpPer"))
                @foreach($errors->get("txtEmpPer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selConPer", "Tipo de Contrato", array("class" => "control-label")) }}
            <select name="selConPer" id="selConPer">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selConPer"))
                @foreach($errors->get("selConPer") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Responsable de Explotación Temporal</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfTemp", 'Número de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfTemp", Input::old("txtProfTemp"),
                            array("class" => "form-control", "placeholder" => "Profesionales", "autocomplete" => "off")) }}
            @if($errors->has("txtProfTemp"))
                @foreach($errors->get("txtProfTemp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpTemp", 'Número de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpTemp", Input::old("txtEmpTemp"),
                            array("class" => "form-control", "placeholder" => "Empleados", "autocomplete" => "off")) }}
            @if($errors->has("txtEmpTemp"))
                @foreach($errors->get("txtEmpTemp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selConTemp", "Tipo de Contrato", array("class" => "control-label")) }}
            <select name="selConTemp" id="selConTemp">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selConTemp"))
                @foreach($errors->get("selConTemp") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Operador Permanente</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfPerOpe", 'Número de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfPerOpe", Input::old("txtProfPerOpe"),
                            array("class" => "form-control", "placeholder" => "Profesionales", "autocomplete" => "off")) }}
            @if($errors->has("txtProfPerOpe"))
                @foreach($errors->get("txtProfPerOpe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpPerOpe", 'Número de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpPerOpe", Input::old("txtEmpPerOpe"),
                            array("class" => "form-control", "placeholder" => "Empleados", "autocomplete" => "off")) }}
            @if($errors->has("txtEmpPerOpe"))
                @foreach($errors->get("txtEmpPerOpe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selConPerOpe", "Tipo de Contrato", array("class" => "control-label")) }}
            <select name="selConPerOpe" id="selConPerOpe">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selConPerOpe"))
                @foreach($errors->get("selConPerOpe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Operador Temporal</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtProfTempOpe", 'Número de Profesionales', array("class" => "control-label")) }}
            {{ Form::text("txtProfTempOpe", Input::old("txtProfTempOpe"),
                            array("class" => "form-control", "placeholder" => "Profesionales", "autocomplete" => "off")) }}
            @if($errors->has("txtProfTempOpe"))
                @foreach($errors->get("txtProfTempOpe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtEmpTempOpe", 'Número de Empleados', array("class" => "control-label")) }}
            {{ Form::text("txtEmpTempOpe", Input::old("txtEmpTempOpe"),
                            array("class" => "form-control", "placeholder" => "Empleados", "autocomplete" => "off")) }}
            @if($errors->has("txtEmpTempOpe"))
                @foreach($errors->get("txtEmpTempOpe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("selConEmpOpe", "Tipo de Contrato", array("class" => "control-label")) }}
            <select name="selConEmpOpe" id="selConEmpOpe">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selConEmpOpe"))
                @foreach($errors->get("selConEmpOpe") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Seguridad Social</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenSalud", "Regimen", array("class" => "control-label")) }}
            <select name="selRegimenSalud" id="selRegimenSalud">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selRegimenSalud"))
                @foreach($errors->get("selRegimenSalud") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantSalud", 'Número de Personas (Salud)', array("class" => "control-label")) }}
            {{ Form::text("txtCantSalud", Input::old("txtCantSalud"),
                            array("class" => "form-control", "placeholder" => "Personas", "autocomplete" => "off")) }}
            @if($errors->has("txtCantSalud"))
                @foreach($errors->get("txtCantSalud") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenPension", "Regimen", array("class" => "control-label")) }}
            <select name="selRegimenPension" id="selRegimenPension">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selRegimenPension"))
                @foreach($errors->get("selRegimenPension") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantPension", 'Número de Personas (Pensión)', array("class" => "control-label")) }}
            {{ Form::text("txtCantPension", Input::old("txtCantPension"),
                            array("class" => "form-control", "placeholder" => "Personas", "autocomplete" => "off")) }}
            @if($errors->has("txtCantPension"))
                @foreach($errors->get("txtCantPension") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenRiesgos", "Regimen", array("class" => "control-label")) }}
            <select name="selRegimenRiesgos" id="selRegimenRiesgos">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selRegimenRiesgos"))
                @foreach($errors->get("selRegimenRiesgos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantRiesgos", 'Número de Personas (Riesgos Laborales)', array("class" => "control-label")) }}
            {{ Form::text("txtCantRiesgos", Input::old("txtCantRiesgos"),
                            array("class" => "form-control", "placeholder" => "Personas", "autocomplete" => "off")) }}
            @if($errors->has("txtCantRiesgos"))
                @foreach($errors->get("txtCantRiesgos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selRegimenNinguno", "Regimen", array("class" => "control-label")) }}
            <select name="selRegimenNinguno" id="selRegimenNinguno">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selRegimenNinguno"))
                @foreach($errors->get("selRegimenNinguno") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCantNinguno", 'Número de Personas (Ninguno)', array("class" => "control-label")) }}
            {{ Form::text("txtCantNinguno", Input::old("txtCantNinguno"),
                            array("class" => "form-control", "placeholder" => "Personas", "autocomplete" => "off")) }}
            @if($errors->has("txtCantNinguno"))
                @foreach($errors->get("txtCantNinguno") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Plano</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoMina", "Tipo Mineria", array("class" => "control-label")) }}
            <select name="selTipoMina" id="selTipoMina">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoMina"))
                @foreach($errors->get("selTipoMina") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
          {{ Form::label("selPlanos", "Cuenta con Planos", array("class" => "control-label")) }}
            <select name="selPlanos" id="selPlanos">
                <option value="">Seleccione..</option>
                <option value="Si">Sí</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selPlanos"))
                @foreach($errors->get("selPlanos") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selTipoPlano", "Tipo Plano", array("class" => "control-label")) }}
            <select name="selTipoPlano" id="selTipoPlano">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoPlano"))
                @foreach($errors->get("selTipoPlano") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{ Form::label("txtFechaPlano", 'Fecha de Actualizacion (fecha General Plano de Labores)', array("class" => "control-label")) }}
            {{ Form::text("txtFechaPlano", Input::old("txtFechaPlano"),
                            array("class" => "form-control", "placeholder" => "Fecha de Actualización", "autocomplete" => "off")) }}
            @if($errors->has("txtFechaPlano"))
                @foreach($errors->get("txtFechaPlano") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Método de Explotación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{ Form::label("selMetodoET", "Método de Explotación", array("class" => "control-label")) }}
            <select name="selMetodoET" id="selMetodoET">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selMetodoET"))
                @foreach($errors->get("selMetodoET") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-5">
            {{ Form::label("selTaludes", "Condiciones de Taludes y Bermas", array("class" => "control-label")) }}
            <select name="selTaludes" id="selTaludes">
                <option value="">Seleccione..</option>
                <option value="Bueno">Bueno</option>
                <option value="Regular">Regular</option>
                <option value="Malo">Malo</option>
            </select>
            @if($errors->has("selTaludes"))
                @foreach($errors->get("selTaludes") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selArranque", "Sistema de Arranque", array("class" => "control-label")) }}
            <select name="selArranque" id="selArranque">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selArranque"))
                @foreach($errors->get("selArranque") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("txtArranque", 'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtArranque", Input::old("txtArranque"),
                            array("class" => "form-control", "placeholder" => "Observación", "autocomplete" => "off")) }}
            @if($errors->has("txtArranque"))
                @foreach($errors->get("txtArranque") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTransporte", "Sistema de Transporte", array("class" => "control-label")) }}
            <select name="selTransporte" id="selTransporte">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTransporte"))
                @foreach($errors->get("selTransporte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("txtTransporte", 'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtTransporte", Input::old("txtTransporte"),
                            array("class" => "form-control", "placeholder" => "Observación", "autocomplete" => "off")) }}
            @if($errors->has("txtTransporte"))
                @foreach($errors->get("txtTransporte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selCargue", "Sistema de Cargue", array("class" => "control-label")) }}
            <select name="selCargue" id="selCargue">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selCargue"))
                @foreach($errors->get("selCargue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-9">
            {{ Form::label("txtCargue", 'Observación', array("class" => "control-label")) }}
            {{ Form::textarea("txtCargue", Input::old("txtCargue"),
                            array("class" => "form-control", "placeholder" => "Observación", "autocomplete" => "off")) }}
            @if($errors->has("txtCargue"))
                @foreach($errors->get("txtCargue") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Infraestructura de Producción - Beneficio Y Transformación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoInf", "Tipo de Infraestructura", array("class" => "control-label")) }}
            <select name="selTipoInf" id="selTipoInf">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoInf"))
                @foreach($errors->get("selTipoInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEstadoInf", "Estado de Infraestructura", array("class" => "control-label")) }}
            <select name="selEstadoInf" id="selEstadoInf">
                <option value="">Seleccione..</option>
                <option value="Bueno">Bueno</option>
                <option value="Regular">Regular</option>
                <option value="Malo">Malo</option>
            </select>
            @if($errors->has("selEstadoInf"))
                @foreach($errors->get("selEstadoInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCoordNorte", 'Coordenada Norte', array("class" => "control-label")) }}
            {{ Form::text("txtCoordNorte", Input::old("txtCoordNorte"),
                            array("class" => "form-control", "placeholder" => "Coordenada Norte", "autocomplete" => "off")) }}
            @if($errors->has("txtCoordNorte"))
                @foreach($errors->get("txtCoordNorte") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCoordEste", 'Coordenada Este', array("class" => "control-label")) }}
            {{ Form::text("txtCoordEste", Input::old("txtCoordEste"),
                            array("class" => "form-control", "placeholder" => "Coordenada Este", "autocomplete" => "off")) }}
            @if($errors->has("txtCoordEste"))
                @foreach($errors->get("txtCoordEste") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCapacidad", 'Capacidad', array("class" => "control-label")) }}
            {{ Form::text("txtCapacidad", Input::old("txtCapacidad"),
                            array("class" => "form-control", "placeholder" => "Capacidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCapacidad"))
                @foreach($errors->get("txtCapacidad") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsInf", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsInf", Input::old("txtObsInf"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsInf"))
                @foreach($errors->get("txtObsInf") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Equipos y Maquinaria</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoEquipo", "Tipo de Equipo", array("class" => "control-label")) }}
            <select name="selTipoEquipo" id="selTipoEquipo">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoEquipo"))
                @foreach($errors->get("selTipoEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selEstadoEquipo", "Estado o Condición", array("class" => "control-label")) }}
            <select name="selEstadoEquipo" id="selEstadoEquipo">
                <option value="">Seleccione..</option>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>
            @if($errors->has("selEstadoEquipo"))
                @foreach($errors->get("selEstadoEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("txtCapacidadEstado", 'Capacidad o Potencia', array("class" => "control-label")) }}
            {{ Form::text("txtCapacidadEstado", Input::old("txtCapacidadEstado"),
                            array("class" => "form-control", "placeholder" => "Capacidad", "autocomplete" => "off")) }}
            @if($errors->has("txtCapacidadEstado"))
                @foreach($errors->get("txtCapacidadEstado") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoComb", "Tipo de Combustible", array("class" => "control-label")) }}
            <select name="selTipoComb" id="selTipoComb">
                <option value="">Seleccione..</option>
                <option value="Gasolina">Gasolina</option>
                <option value="ACPM">ACPM</option>
            </select>
            @if($errors->has("selTipoComb"))
                @foreach($errors->get("selTipoComb") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtCantidadComb", 'Cantidad de Combustible', array("class" => "control-label")) }}
            {{ Form::text("txtCantidadComb", Input::old("txtCantidadComb"),
                            array("class" => "form-control", "placeholder" => "Cantidad de Combustible", "autocomplete" => "off")) }}
            @if($errors->has("txtCantidadComb"))
                @foreach($errors->get("txtCantidadComb") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12">
            {{ Form::label("txtObsEquipo", 'Observaciones', array("class" => "control-label")) }}
            {{ Form::textarea("txtObsEquipo", Input::old("txtObsEquipo"),
                            array("class" => "form-control", "placeholder" => "Observaciones", "autocomplete" => "off")) }}
            @if($errors->has("txtObsEquipo"))
                @foreach($errors->get("txtObsEquipo") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Condiciones de Ventilación</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selMonGas", "Monitor de Gas", array("class" => "control-label")) }}
            <select name="selMonGas" id="selMonGas">
                <option value="">Seleccione..</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selMonGas"))
                @foreach($errors->get("selMonGas") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTablero", "Tableros de Medición", array("class" => "control-label")) }}
            <select name="selTablero" id="selTablero">
                <option value="">Seleccione..</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selTablero"))
                @foreach($errors->get("selTablero") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-4">
            {{ Form::label("txtFrenVenti", 'Frente Bajo Tierra', array("class" => "control-label")) }}
            {{ Form::text("txtFrenVenti", Input::old("txtFrenVenti"),
                            array("class" => "form-control", "placeholder" => "Frentes Bajo Tierra", "autocomplete" => "off")) }}
            @if($errors->has("txtFrenVenti"))
                @foreach($errors->get("txtFrenVenti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary">Instalaciones Eléctricas</p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-2">
            {{ Form::label("selEnergia", "Energía Eléctrica", array("class" => "control-label")) }}
            <select name="selEnergia" id="selEnergia">
                <option value="">Seleccione..</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selEnergia"))
                @foreach($errors->get("selEnergia") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selTipoFuente", "Tipo de Fuente de Energia", array("class" => "control-label")) }}
            <select name="selTipoFuente" id="selTipoFuente">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selTipoFuente"))
                @foreach($errors->get("selTipoFuente") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selDisparador", "Disparadores de Seguridad", array("class" => "control-label")) }}
            <select name="selDisparador" id="selDisparador">
                <option value="">Seleccione..</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selDisparador"))
                @foreach($errors->get("selDisparador") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selInstalaElec", "Instalaciones Eléctricas", array("class" => "control-label")) }}
            <select name="selInstalaElec" id="selInstalaElec">
                <option value="">Seleccione..</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
            @if($errors->has("selInstalaElec"))
                @foreach($errors->get("selInstalaElec") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtTensionUti", 'Tensión Utilizada', array("class" => "control-label")) }}
            {{ Form::text("txtTensionUti", Input::old("txtTensionUti"),
                            array("class" => "form-control", "placeholder" => "Valor en Voltios", "autocomplete" => "off")) }}
            @if($errors->has("txtTensionUti"))
                @foreach($errors->get("txtTensionUti") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <p class="bg-primary"> Aspecto Económico </p>
    <div class="row">
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtCostoTon", 'Costo Tonelada en frente o bocamina', array("class" => "control-label")) }}
            {{ Form::text("txtCostoTon", Input::old("txtCostoTon"),
                            array("class" => "form-control", "placeholder" => "Costo Tonelada", "autocomplete" => "off")) }}
            @if($errors->has("txtCostoTon"))
                @foreach($errors->get("txtCostoTon") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("txtPrecioVenta", 'Precio de Venta', array("class" => "control-label")) }}
            {{ Form::text("txtPrecioVenta", Input::old("txtPrecioVenta"),
                            array("class" => "form-control", "placeholder" => "Precio de Venta", "autocomplete" => "off")) }}
            @if($errors->has("txtPrecioVenta"))
                @foreach($errors->get("txtPrecioVenta") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
        <div class="form-group form-group-sm col-xs-12 col-sm-3">
            {{ Form::label("selDestinoEco", "Destino", array("class" => "control-label")) }}
            <select name="selDestinoEco" id="selDestinoEco">
                <option value="">Seleccione..</option>
            </select>
            @if($errors->has("selDestinoEco"))
                @foreach($errors->get("selDestinoEco") as $error)
                  <span class="help-block alert alert-danger">  * {{ $error }} </span>
                @endforeach
            @endif
        </div>
    </div>
    <div id="" align="center" style="right: 0px; bottom: 0px; width: 100%; z-index: 200; height: 30px; position: fixed; background-color: #72317d; background-repeat:repeat-x; display:block">
        <input type="submit" class="btn btn-primary" name="btnGrabar" id="btnGrabar" value="Grabar">
    </div>
</div>