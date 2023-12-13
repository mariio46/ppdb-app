@extends('base', ['title' => 'New-Components'])

@section('vendorStyles')
    {{-- Select2 --}}
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">

    {{-- DataTable --}}
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css" rel="stylesheet">

    {{-- Toastr --}}
    <link type="text/css" href="/app-assets/vendors/css/extensions/toastr.min.css" rel="stylesheet">
@endsection

@section('body')
    <div class="p-2">
        <h1>New Components</h1>

        <section id="buttons-variants">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Buttons</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                Button Variants
                            </p>
                            {{-- default buttons --}}
                            <div class="demo-inline-spacing">
                                <x-button variant="default" color="primary">Primary</x-button>
                                <x-button variant="default" color="secondary">Secondary</x-button>
                                <x-button variant="default" color="success">Success</x-button>
                                <x-button variant="default" color="danger">Danger</x-button>
                                <x-button variant="default" color="warning">Warning</x-button>
                                <x-button variant="default" color="info">Info</x-button>
                                <x-button variant="default" color="dark">Dark</x-button>
                            </div>

                            {{-- outline buttons --}}
                            <div class="demo-inline-spacing">
                                <x-button variant="outline" color="primary">Primary</x-button>
                                <x-button variant="outline" color="secondary">Secondary</x-button>
                                <x-button variant="outline" color="success">Success</x-button>
                                <x-button variant="outline" color="danger">Danger</x-button>
                                <x-button variant="outline" color="warning">Warning</x-button>
                                <x-button variant="outline" color="info">Info</x-button>
                                <x-button variant="outline" color="dark">Dark</x-button>
                            </div>

                            {{-- flat buttons --}}
                            <div class="demo-inline-spacing">
                                <x-button variant="flat" color="primary">Primary</x-button>
                                <x-button variant="flat" color="secondary">Secondary</x-button>
                                <x-button variant="flat" color="success">Success</x-button>
                                <x-button variant="flat" color="danger">Danger</x-button>
                                <x-button variant="flat" color="warning">Warning</x-button>
                                <x-button variant="flat" color="info">Info</x-button>
                                <x-button variant="flat" color="dark">Dark</x-button>
                            </div>

                            {{-- buttons with text & icon --}}
                            <div class="demo-inline-spacing">
                                <x-button class="d-flex align-items-center" variant="default" color="primary">
                                    Primary
                                </x-button>
                                <x-button variant="outline" color="secondary">
                                    Secondary
                                </x-button>
                                <x-button variant="flat" color="success">
                                    Success
                                </x-button>
                            </div>

                            {{-- buttons with only icon --}}
                            <div class="demo-inline-spacing">
                                <x-button variant="default" color="primary" withIcon>
                                </x-button>
                                <x-button class="rounded-circle" variant="outline" color="secondary" withIcon>
                                </x-button>
                                <x-button variant="flat" color="success" withIcon>
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="badges-variants">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Badges</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                Badge Variants
                            </p>
                            {{-- default badges --}}
                            <div class="demo-inline-spacing">
                                <x-badge variant="default" color="primary">Primary</x-badge>
                                <x-badge variant="default" color="secondary">Secondary</x-badge>
                                <x-badge variant="default" color="success">Success</x-badge>
                                <x-badge variant="default" color="danger">Danger</x-badge>
                                <x-badge variant="default" color="warning">Warning</x-badge>
                                <x-badge variant="default" color="info">Info</x-badge>
                                <x-badge variant="default" color="dark">Dark</x-badge>
                            </div>
                            {{-- light badges --}}
                            <div class="demo-inline-spacing">
                                <x-badge variant="light" color="primary">Primary</x-badge>
                                <x-badge variant="light" color="secondary">Secondary</x-badge>
                                <x-badge variant="light" color="success">Success</x-badge>
                                <x-badge variant="light" color="danger">Danger</x-badge>
                                <x-badge variant="light" color="warning">Warning</x-badge>
                                <x-badge variant="light" color="info">Info</x-badge>
                                <x-badge variant="light" color="dark">Dark</x-badge>
                            </div>
                            {{-- badges with text & icon --}}
                            <div class="demo-inline-spacing">
                                <x-badge variant="default" color="primary">
                                    Primary
                                </x-badge>
                                <x-badge variant="default" color="secondary">
                                    Secondary
                                </x-badge>
                                <x-badge variant="default" color="success">
                                    Success
                                </x-badge>
                                <x-badge variant="light" color="danger">
                                    Danger
                                </x-badge>
                                <x-badge variant="light" color="warning">
                                    Warning
                                </x-badge>
                                <x-badge variant="light" color="info">
                                    Info
                                </x-badge>
                                <x-badge variant="default" color="dark">
                                    Dark
                                </x-badge>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="inputs-variant">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Inputs Form</p>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                Input Variants
                            </p>
                            <div>
                                <x-label for="email" value="Email" />
                                <x-input class="@if ($errors->get('email')) 'is-invalid' @endif" id="email" name="email" type="email" />
                                <x-input-error :values="$errors->get('email')" />
                            </div>
                            <div>
                                <x-label for="picture">Picture</x-label>
                                <x-input id="picture" name="picture" type="file" />
                            </div>
                            <div>
                                <x-label for="pictures">Pictures</x-label>
                                <x-input id="pictures" name="pictures" type="file" multiple />
                            </div>
                            <div>
                                <x-label for="about">About</x-label>
                                <x-textarea id="about" name="about" placeholder="Write about yourself" />
                            </div>
                            <x-checkbox class="form-check-danger" identifier="remember-me" label="Remember me" variant="primary" />

                            <div>
                                <x-label for="select2-multiple">Select Language</x-label>
                                <x-select class="form-select select2" id="select2-multiple" multiple>
                                    <optgroup label="Language">
                                        <option value="id">Indonesia</option>
                                        <option value="en">English</option>
                                        <option value="my">Malaysia</option>
                                    </optgroup>
                                </x-select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="modals-variant">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Modals</p>
                        </div>
                        <div class="card-body">
                            <x-button data-bs-toggle="modal" data-bs-target="#default" type="button" variant="default" color="primary">Default Modal</x-button>

                            {{-- <x-modal>
                                <x-modal.header>
                                    <h4 class="modal-title" id="myModalLabel1">Hello this is modal</h4>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                </x-modal.header>
                                <x-modal.body>
                                    <h5 class="text-center">This modal is from component</h5>
                                    <p>
                                        Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie. Brownie
                                        carrot cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                                        chocolate cake liquorice.
                                    </p>
                                </x-modal.body>
                                <x-modal.footer>
                                    <x-button data-bs-dismiss="modal" type="button">Save</x-button>
                                </x-modal.footer>
                            </x-modal>
                            <div class="modal fade" id="default" aria-labelledby="myModalLabel1" aria-hidden="true" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
                                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Check First Paragraph</h5>
                                            <p>
                                                Oat cake ice cream candy chocolate cake chocolate cake cotton candy dragée apple pie. Brownie
                                                carrot cake candy canes bonbon fruitcake topping halvah. Cake sweet roll cake cheesecake cookie
                                                chocolate cake liquorice.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- Select2 --}}
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script> {{-- init select2 script --}}

    {{-- DataTable --}}
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="/app-assets/js/scripts/tables/table-datatables-advanced.js"></script> {{-- init datatable script --}}

    {{-- Toastr --}}
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="/app-assets/js/scripts/extensions/ext-component-toastr.js"></script> {{-- init toastr script --}}
@endpush
