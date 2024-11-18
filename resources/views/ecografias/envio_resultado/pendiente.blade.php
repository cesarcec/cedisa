@extends('plantilla/layout')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
@endsection


@section('contenido')
    <div class="card">
        <div class="card-header pointer-cursor" data-toggle="collapse" data-target="#collapse-form" aria-expanded="false"
            aria-controls="collapse-form">
            <div class="d-flex justify-content-between">
                <h3 class="my-2 mx-2">Envíos pendientes</h1>
            </div>
        </div>
    </div>

    <section class="tablets mt-3">
        {{-- <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#tab-index" data-toggle="tab"><i
                                class="bi bi-scissors"></i>&nbsp;&nbsp;Especialistas</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#tab-delete" data-toggle="tab"><i
                                class="bi bi-trash"></i>&nbsp;&nbsp;Eliminados</a>
                    </li>
                </ul>
            </div>
        </div> --}}
        <div class="tab-content">
            <div class="active tab-pane" id="tab-index">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" data-field="fecha">fecha del resultado</th>
                            <th scope="col" data-field="estado_envio">Estado de envío</th>
                            <th scope="col" data-field="estado_envio">Detalle</th>
                            <th scope="col" data-field="action">Asignar Repartidor</th>
                            <th scope="col" data-field="action">Rechazar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($envioResultados as $envioResultado)
                            <tr>
                                <th scope="row">{{ $envioResultado->id }}</th>

                                <td>{{ $envioResultado->fecha }}</td>

                                <td class="text-success">{{ $envioResultado->estado_envio }}</td>

                                <td class="text-success">
                                    <!-- Botón con ícono para activar el modal -->
                                    <button data-envio-id={{ $envioResultado->id }} type="button"
                                        class="btn btn-primary btn-modal" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-info-circle ml-1"></i>
                                    </button>
                                </td>

                                <!-- Button asignar repartidor trigger modal -->
                                <td>
                                    <div class="row">
                                        <div class="col col-9">
                                            <select id="repartidor{{ $envioResultado->id }}" class="form-control">
                                                <option value="">Seleccione un repartidor</option>
                                                @foreach ($repartidores as $repartidor)
                                                    <option value="{{ $repartidor->id }}">{{ $repartidor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col col-3">
                                            <button data-envio-id={{ $envioResultado->id }}
                                                class="asignar btn btn-primary">Asignar</button>
                                        </div>
                                    </div>

                                </td>
                                <td class="text-success"><button data-envio-id={{ $envioResultado->id }}
                                        class="rechazar btn btn-danger">Rechazar</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles del Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="container">
                        <div class="row">
                            <div class="col-3">
                                <label for="numero-examen">Exámen</label>
                                <input disabled id="numero-examen" type="text" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="recomendaciones">Recomendaciones</label>
                                <textarea disabled id="recomendaciones" class="form-control"></textarea>
                            </div>
                            {{-- <div class="col-9">
                                <label for="paciente">Paciente</label>
                                <input disabled id="paciente" type="text" class="form-control">
                            </div> --}}
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <label for="informe">Informe</label>
                                <textarea disabled id="informe" class="form-control"></textarea>
                            </div>
                            <div class="col-7">
                                <label for="ubicacion">Ubicación</label>
                                <input disabled id="ubicacion" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <label for="conclusiones">Conclusiones</label>
                                <textarea disabled id="conclusiones" class="form-control"></textarea>
                            </div>
                            <div class="col-4">
                                <label for="fecha">Fecha</label>
                                <input disabled id="fecha" type="text" class="form-control">
                            </div>

                        </div>



                        {{-- <div class="row">
                            <div class="col-12">
                                <label for="imagen">Imagen</label>
                                <img src="" alt="..." id="imagen" class="img-fluid mt-2">
                            </div>
                        </div> --}}

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('class/urlLocal.js') }}"></script>
    <script src="{{ asset('envio/js/pendiente.js') }}"></script>
    {{-- <script src="{{ asset('class/apiCLient.js') }}"></script>
    <script src="{{ asset('class/crudHandler.js') }}"></script> --}}
@endsection
