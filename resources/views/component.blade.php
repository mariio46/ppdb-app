@extends('base', ['title' => $title ?? ''])

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
        <h1>Component</h1>

        <h4>Card</h4>
        <div class="row match-height">
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Title</div>
                        <div class="card-subtitle">Lorem ipsum dolor sit amet.</div>
                    </div>
                    <div class="card-body">
                        <p>This is Card Body</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus delectus numquam sed neque! Est voluptatem minus aut quis, laudantium repellendus!</p>
                    </div>
                    <div class="card-footer">
                        <p>footer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                {{-- card start --}}
                <div class="card">
                    <img class="card-img-top" src="/app-assets/images/slider/04.jpg" alt="Card image cap" />
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <a class="btn btn-outline-primary" href="#">Go somewhere</a>
                    </div>
                </div>
                {{-- card end --}}
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Card title</h4>
                        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                    </div>
                    <img class="img-fluid" src="/app-assets/images/slider/03.jpg" alt="Card image cap" />
                    <div class="card-body">
                        <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                        <a class="card-link" href="#">Card link</a>
                        <a class="card-link" href="#">Another link</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Card title</h4>
                        <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                        <img class="img-fluid my-2" src="/app-assets/images/slider/06.jpg" alt="Card image cap" />
                        <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                        <a class="card-link" href="#">Card link</a>
                        <a class="card-link" href="#">Another link</a>
                    </div>
                </div>
            </div>
        </div>

        <h4>Alerts</h4>
        <section id="alerts">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- alert start --}}
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    <i class="me-50" data-feather="star"></i>
                                    <span>Chupa chups topping bonbon. Jelly-o toffee I love. Sweet I love wafer I love wafer.</span>
                                </div>
                                <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
                            </div>
                            {{-- alert end --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h4>Avatars</h4>
        <section id="default-avatar-sizes">
            <div class="row match-height">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sizes</h4>
                        </div>
                        <div class="card-body">
                            <div class="demo-inline-spacing">
                                <div class="avatar avatar-sm">
                                    <img src="/app-assets/images/portrait/small/avatar-s-20.jpg" alt="avatar" />
                                </div>
                                <div class="avatar">
                                    <img src="/app-assets/images/portrait/small/avatar-s-20.jpg" alt="avatar" width="32" height="32" />
                                </div>
                                <div class="avatar avatar-lg">
                                    <img src="/app-assets/images/portrait/small/avatar-s-20.jpg" alt="avatar" />
                                </div>
                                <div class="avatar avatar-xl">
                                    <img src="/app-assets/images/portrait/small/avatar-s-20.jpg" alt="avatar" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Initials</h4>
                        </div>
                        <div class="card-body">
                            <div class="demo-inline-spacing">
                                <div class="avatar bg-light-primary avatar-sm">
                                    <span class="avatar-content">PI</span>
                                </div>
                                <div class="avatar bg-light-secondary">
                                    <span class="avatar-content">PI</span>
                                </div>
                                <div class="avatar bg-light-success avatar-lg">
                                    <span class="avatar-content">PI</span>
                                </div>
                                <div class="avatar bg-light-danger avatar-xl">
                                    <span class="avatar-content">PI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Colors</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                Use class <code>bg-{color-name}</code> to change background color of your avatar.
                            </p>
                            <div class="demo-inline-spacing">
                                <div class="avatar bg-primary">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-secondary">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-success">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-danger">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-warning">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-info">
                                    <div class="avatar-content">PI</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Light Colors</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                Use class <code>bg-light-{color-name}</code> to change background color of your avatar.
                            </p>
                            <div class="demo-inline-spacing">
                                <div class="avatar bg-light-primary">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-light-secondary">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-light-success">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-light-danger">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-light-warning">
                                    <div class="avatar-content">PI</div>
                                </div>
                                <div class="avatar bg-light-info">
                                    <div class="avatar-content">PI</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Icons</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">Use <code>.avatar-icon</code> class for Icon variant</p>
                            <div class="demo-inline-spacing">
                                <div class="avatar bg-primary">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="calendar"></i>
                                    </div>
                                </div>
                                <div class="avatar bg-secondary">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="github"></i>
                                    </div>
                                </div>
                                <div class="avatar bg-success">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="inbox"></i>
                                    </div>
                                </div>
                                <div class="avatar bg-light-danger">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="camera"></i>
                                    </div>
                                </div>
                                <div class="avatar bg-light-warning">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="award"></i>
                                    </div>
                                </div>
                                <div class="avatar bg-light-info">
                                    <div class="avatar-content">
                                        <i class="avatar-icon" data-feather="star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Status</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                Use class <code>.avatar-status-{online | offline | away | busy}</code> after <code>.avatar-content</code>.
                            </p>
                            <div class="demo-inline-spacing">
                                <div class="avatar">
                                    <img src="/app-assets/images/portrait/small/avatar-s-20.jpg" alt="avatar" width="32" height="32" />
                                    <span class="avatar-status-offline"></span>
                                </div>
                                <div class="avatar bg-info">
                                    <span class="avatar-content">BV</span>
                                    <span class="avatar-status-busy"></span>
                                </div>
                                <div class="avatar bg-light-primary">
                                    <span class="avatar-content"><i class="avatar-icon" data-feather="github"></i></span>
                                    <span class="avatar-status-away"></span>
                                </div>
                                <div class="avatar bg-light-success">
                                    <span class="avatar-content">AB</span>
                                    <span class="avatar-status-online"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h4>Badges</h4>
        <div class="row match-height">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contextual Badges</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text m-0">
                            Use the <code>.badge</code> class, followed by<code>.bg-&#123;color&#125;</code>class within element to
                            create primary badge.
                        </p>
                        <div class="demo-inline-spacing">
                            <span class="badge bg-primary">Primary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-success">Success</span>
                            <span class="badge bg-danger">Danger</span>
                            <span class="badge bg-warning">Warning</span>
                            <span class="badge bg-info">Info</span>
                            <span class="badge bg-dark">Dark</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Light Badges</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text m-0">
                            Use class <code>.badge</code> class with <code>.badge-light-&#123;color&#125;</code> to add light effect to
                            your badge.
                        </p>
                        <div class="demo-inline-spacing">
                            <span class="badge bg-light-primary">Primary</span>
                            <span class="badge bg-light-secondary">Secondary</span>
                            <span class="badge bg-light-success">Success</span>
                            <span class="badge bg-light-danger">Danger</span>
                            <span class="badge bg-light-warning">Warning</span>
                            <span class="badge bg-light-info">Info</span>
                            <span class="badge bg-light-dark">Dark</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Badges With Icons</h4>
                    </div>
                    <div class="card-body">
                        <div class="demo-inline-spacing">
                            <span class="badge bg-primary">
                                <i class="me-25" data-feather="star"></i>
                                <span>Primary</span>
                            </span>
                            <span class="badge bg-secondary">
                                <i class="me-25" data-feather="star"></i>
                                <span>Secondary</span>
                            </span>
                            <span class="badge bg-success">
                                <i class="me-25" data-feather="star"></i>
                                <span>Success</span>
                            </span>
                            <span class="badge bg-danger">
                                <i class="me-25" data-feather="star"></i>
                                <span>Danger</span>
                            </span>
                            <span class="badge bg-warning">
                                <i class="me-25" data-feather="star"></i>
                                <span>Warning</span>
                            </span>
                            <span class="badge bg-info">
                                <i class="me-25" data-feather="star"></i>
                                <span>Info</span>
                            </span>
                            <span class="badge bg-dark">
                                <i class="me-25" data-feather="star"></i>
                                <span>Info</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4>Buttons</h4>
        <div class="row">
            <div class="col">
                {{-- Filled Buttons start --}}
                <section id="basic-buttons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-title">Basic Buttons</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-0">
                                        Bootstrap includes six predefined button styles.
                                    </p>
                                    {{-- basic buttons --}}
                                    <div class="demo-inline-spacing">
                                        <button class="btn btn-primary" type="button">Primary</button>
                                        <button class="btn btn-secondary" type="button">Secondary</button>
                                        <button class="btn btn-success" type="button">Success</button>
                                        <button class="btn btn-danger" type="button">Danger</button>
                                        <button class="btn btn-warning" type="button">Warning</button>
                                        <button class="btn btn-info" type="button">Info</button>
                                        <button class="btn btn-dark" type="button">Dark</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Filled Buttons end --}}
            </div>
            <div class="col">
                {{-- Outline Buttons start --}}
                <section id="outline-button">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-title">Border Buttons</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-0">
                                        Use a class <code>.btn-outline-{color}</code> to quickly create a outline button.
                                    </p>
                                    {{-- Outline buttons  --}}
                                    <div class="demo-inline-spacing">
                                        <button class="btn btn-outline-primary" type="button">Primary</button>
                                        <button class="btn btn-outline-secondary" type="button">Secondary</button>
                                        <button class="btn btn-outline-success" type="button">Success</button>
                                        <button class="btn btn-outline-danger" type="button">Danger</button>
                                        <button class="btn btn-outline-warning" type="button">Warning</button>
                                        <button class="btn btn-outline-info" type="button">Info</button>
                                        <button class="btn btn-outline-dark" type="button">Dark</button>
                                        <br />
                                        <x-button variant="flat" color="success">
                                            <x-icons data-feather="check" />
                                            <span>Outline</span>
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Outline Buttons end --}}
            </div>
            <div class="col">
                {{-- Flat Buttons start --}}
                <section id="flat-buttons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-title">Flat Buttons</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-0">Use <code>.btn-flat-{color}</code> to create a flat button</p>
                                    <div class="demo-inline-spacing">
                                        <button class="btn btn-flat-primary" type="button">Primary</button>
                                        <button class="btn btn-flat-secondary" type="button">Secondary</button>
                                        <button class="btn btn-flat-success" type="button">Success</button>
                                        <button class="btn btn-flat-danger" type="button">Danger</button>
                                        <button class="btn btn-flat-warning" type="button">Warning</button>
                                        <button class="btn btn-flat-info" type="button">Info</button>
                                        <button class="btn btn-flat-dark" type="button">Dark</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Flat Buttons end --}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{-- Basic Button Icon start --}}
                <section id="basic-button-icons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-title">Buttons with Icon</p>
                                </div>
                                <div class="card-body">
                                    {{-- Buttons with Icon  --}}
                                    <div class="demo-inline-spacing">
                                        <button class="btn btn-outline-primary" type="button">
                                            <i class="me-25" data-feather="home"></i>
                                            <span>Home</span>
                                        </button>
                                        <button class="btn btn-warning" type="button">
                                            <i class="me-25" data-feather="star"></i>
                                            <span>Star</span>
                                        </button>
                                        <button class="btn btn-flat-success" type="button">
                                            <i class="me-25" data-feather="check"></i>
                                            <span>Done</span>
                                        </button>
                                        <button class="btn btn-outline-primary" type="button" disabled>
                                            <i class="me-25" data-feather="home"></i>
                                            <span>Home</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Basic Button Icon end  --}}
            </div>
            <div class="col">
                {{-- Icon Buttons start  --}}
                <section id="icon-only-buttons">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-title">Buttons with Icon Only</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text mb-0">
                                        You can use <code>.btn-icon</code>. you can create a rounded button by using
                                        <code>.rounded-circle</code> with <code>.btn-icon</code>. You can only use <code>.btn-icon</code> when you
                                        only want icon in your button
                                    </p>
                                    <div class="demo-inline-spacing">
                                        <button class="btn btn-icon btn-outline-primary" type="button">
                                            <i data-feather="search"></i>
                                        </button>
                                        <button class="btn btn-icon btn-warning" type="button">
                                            <i data-feather="inbox"></i>
                                        </button>
                                        <button class="btn btn-icon btn-flat-success" type="button">
                                            <i data-feather="camera"></i>
                                        </button>
                                        <button class="btn btn-icon btn-outline-primary" type="button" disabled>
                                            <i data-feather="search"></i>
                                        </button>
                                        <button class="btn btn-icon rounded-circle btn-outline-primary" type="button">
                                            <i data-feather="search"></i>
                                        </button>
                                        <button class="btn btn-icon btn-icon rounded-circle btn-warning" type="button">
                                            <i data-feather="inbox"></i>
                                        </button>
                                        <button class="btn btn-icon btn-icon rounded-circle btn-flat-success" type="button">
                                            <i data-feather="camera"></i>
                                        </button>
                                        <button class="btn btn-icon btn-icon rounded-circle btn-outline-primary" type="button" disabled>
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Icon Buttons end  --}}
            </div>
            <div class="col">
                {{-- Basic Button group start  --}}
                <section id="basic-button-group">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <p class="card-title">Group Buttons</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Group a series of buttons together on a single line with the button group. Wrap a series of buttons with
                                        <code>.btn</code> in <code>.btn-group</code>.
                                    </p>
                                    {{-- button group  --}}
                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-1 mb-lg-0">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-primary" type="button">Left</button>
                                                <button class="btn btn-primary" type="button">Middle</button>
                                                <button class="btn btn-primary" type="button">Right</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button class="btn btn-outline-primary" type="button"><i data-feather="facebook"></i></button>
                                                <button class="btn btn-outline-primary" type="button"><i data-feather="twitter"></i></button>
                                                <button class="btn btn-outline-primary" type="button"><i data-feather="instagram"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Basic Button group end  --}}
            </div>
        </div>

        <h4>Modals</h4>
        <section id="basic-modals">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Modal</h4>
                        </div>
                        <div class="card-body">
                            <div class="demo-inline-spacing">
                                <!-- Basic trigger modal -->
                                <div class="basic-modal">
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#default" type="button">
                                        Basic Modal
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade text-start" id="default" aria-labelledby="myModalLabel1" aria-hidden="true" tabindex="-1">
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
                                    </div>
                                </div>
                                <!-- Basic trigger modal end -->

                                <!-- Vertical modal -->
                                <div class="vertical-modal-ex">
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" type="button">
                                        Vertically Centered
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Croissant jelly-o halvah chocolate sesame snaps. Brownie caramels candy canes chocolate cake
                                                        marshmallow icing lollipop I love. Gummies macaroon donut caramels biscuit topping danish.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Vertical modal end-->

                                <!-- Disabled Backdrop -->
                                <div class="disabled-backdrop-ex">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#backdrop" type="button">
                                        Disabled Backdrop
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start" id="backdrop" data-bs-backdrop="false" aria-labelledby="myModalLabel4" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel4">Disabled Backdrop</h4>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Candy oat cake topping topping chocolate cake. Icing pudding jelly beans I love chocolate carrot
                                                        cake wafer candy canes. Biscuit croissant fruitcake bonbon soufflé.
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Disabled Backdrop end-->

                                <!-- Disabled Animation -->
                                <div class="disabled-animation-ex">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#animation" type="button">
                                        Disabled Animation
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal text-start" id="animation" aria-labelledby="myModalLabel6" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel6">Disabled Animation</h4>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Chocolate bar jelly dragée cupcake chocolate bar I love donut liquorice. Powder I love marzipan
                                                        donut candy canes jelly-o. Dragée liquorice apple pie candy biscuit danish lemon drops sugar
                                                        plum.
                                                    </p>
                                                    <div class="alert alert-success" role="alert">
                                                        <div class="alert-body">
                                                            <span class="fw-bolder">Well done!</span> You successfully read this important alert message.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Disabled Animation end-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Modal Themes</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                Use class <code>.modal-{color}</code> with your <code>.modal</code> to change theme of modal
                            </p>
                            <div class="demo-inline-spacing">
                                <div class="d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#primary" type="button">
                                        Primary
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start modal-primary" id="primary" aria-labelledby="myModalLabel160" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel160">Primary Modal</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                                                    carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                                                    bears cupcake dessert.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#secondary" type="button">
                                        Secondary
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-secondary text-start" id="secondary" aria-labelledby="myModalLabel1660" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1660">Secondary Modal</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                                                    carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                                                    bears cupcake dessert.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#success" type="button">
                                        Success
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start modal-success" id="success" aria-labelledby="myModalLabel110" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel110">Success Modal</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                                                    carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                                                    bears cupcake dessert.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#danger" type="button">
                                        Danger
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-danger text-start" id="danger" aria-labelledby="myModalLabel120" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel120">Danger Modal</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                                                    carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                                                    bears cupcake dessert.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#warning" type="button">
                                        Warning
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start modal-warning" id="warning" aria-labelledby="myModalLabel140" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel140">Warning Modal</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                                                    carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                                                    bears cupcake dessert.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-warning" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#info" type="button">
                                        Info
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-info text-start" id="info" aria-labelledby="myModalLabel130" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel130">Info Modal</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                                                    carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                                                    bears cupcake dessert.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-info" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#dark" type="button">
                                        Dark
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade modal-dark text-start" id="dark" aria-labelledby="myModalLabel150" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel150">Dark Modal</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tart lemon drops macaroon oat cake chocolate toffee chocolate bar icing. Pudding jelly beans
                                                    carrot cake pastry gummies cheesecake lollipop. I love cookie lollipop cake I love sweet gummi
                                                    bears cupcake dessert.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-dark" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Modal Sizes</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text mb-0">
                                Add class <code>.modal-{xs|sm|lg|xl}</code> with <code>.modal-dialog</code> to create a modal with size
                            </p>

                            <div class="demo-inline-spacing">
                                <div class="modal-size-xs d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#xSmall" type="button">
                                        Extra Small
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start" id="xSmall" aria-labelledby="myModalLabel20" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-xs">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel20">Extra Small Modal</h4>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Halvah powder wafer. Chupa chups pie topping carrot cake cake. Tootsie roll sesame snaps jelly-o
                                                    marshmallow marshmallow jelly jujubes candy. Chupa chups cheesecake gingerbread chupa chups cake
                                                    candy canes sweet roll.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-size-sm d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#small" type="button">
                                        Small Modal
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start" id="small" aria-labelledby="myModalLabel19" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel19">Small Modal</h4>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Biscuit chocolate cake gummies. Lollipop I love macaroon bear claw caramels. I love marshmallow
                                                    tiramisu I love fruitcake I love gummi bears. Carrot cake topping liquorice. Pudding caramels
                                                    liquorice sweet I love. Donut powder cupcake ice cream tootsie roll jelly.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-size-default d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#defaultSize" type="button">
                                        Default Modal
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start" id="defaultSize" aria-labelledby="myModalLabel18" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel18">Default Modal</h4>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    I love candy candy cake powder I love icing ice cream pastry. Biscuit lemon drops sesame snaps.
                                                    Topping biscuit croissant gummi bears jelly beans cake cake bear claw muffin. Lemon drops oat cake
                                                    pastry bear claw liquorice lemon drops.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-size-lg d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#large" type="button">
                                        Large Modal
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start" id="large" aria-labelledby="myModalLabel17" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel17">Large Modal</h4>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    I love tart cookie cupcake. I love chupa chups biscuit. I love marshmallow apple pie wafer
                                                    liquorice. Marshmallow cotton candy chocolate. Apple pie muffin tart. Marshmallow halvah pie
                                                    marzipan lemon drops jujubes. Macaroon sugar plum cake icing toffee.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-size-xl d-inline-block">
                                    <!-- Button trigger modal -->
                                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#xlarge" type="button">
                                        Extra Large Modal
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade text-start" id="xlarge" aria-labelledby="myModalLabel16" aria-hidden="true" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel16">Extra Large Modal</h4>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Cake cupcake sugar plum. Sesame snaps pudding cupcake candy canes icing cheesecake. Sweet roll
                                                    pudding lollipop apple pie gummies dragée. Chocolate bar cookie caramels I love lollipop ice cream
                                                    tiramisu lollipop sweet.
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h4>Paginations</h4>
        <div class="row">
            <!-- Pagination with Only Icons starts -->
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Only icons</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Pagination with only icons</p>
                        <nav aria-label="Page navigation">
                            <ul class="pagination mt-2">
                                <li class="page-item prev"><a class="page-link" href="#"></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">4</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item"><a class="page-link" href="#">7</a></li>
                                <li class="page-item next"><a class="page-link" href="#"></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Pagination with Only Icons ends -->

            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Pagination Positions</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Use classes <code>.justify-content-{direction}</code> with <code>.pagination</code> to align your
                            pagination.
                        </p>
                        <div class="row">
                            <div class="col-xl-4 col-lg-12">
                                <h5 class="text-start">Left Aligned</h5>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-start mt-2">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                                <h5 class="text-center">Center Aligned</h5>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-2">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                                <h5 class="text-end">Right Aligned</h5>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-end mt-2">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4>Toasts</h4>
        <div class="row">
            <div class="col-4">
                <section id="toastr-types">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Types</h4>
                        </div>
                        <div class="card-body">
                            <div class="demo-inline-spacing">
                                <x-button id="type-success" type="button" variant='outline' color="success">Successs</x-button>
                                <button class="btn btn-outline-danger" id="type-error" type="button">Error</button>
                                <button class="btn btn-outline-warning" id="type-warning" type="button">Warning</button>
                                <button class="btn btn-outline-info" id="type-info" type="button">Info</button>
                                <button class="btn btn-outline-success" id="progress-bar" type="button">Success Progress Bar</button>
                                <button class="btn btn-outline-primary" id="clear-toast-btn" type="button">Clear Toast</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-8">
                <section id="toastr-position">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Position</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="mb-0">Top Positions</h5>
                                    <div class="demo-inline-spacing">
                                        <button class="btn btn-outline-primary" id="position-top-left" type="button">Top Left</button>
                                        <button class="btn btn-outline-primary" id="position-top-center" type="button">Top Center</button>
                                        <button class="btn btn-outline-primary" id="position-top-right" type="button">Top Right</button>
                                        <button class="btn btn-outline-primary" id="position-top-full" type="button">Top Full Width</button>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <h5 class="mt-2 mb-0">Bottom Positions</h5>
                                    <div class="demo-inline-spacing">
                                        <button class="btn btn-outline-primary" id="position-bottom-left" type="button">Bottom Left</button>
                                        <button class="btn btn-outline-primary" id="position-bottom-center" type="button">Bottom Center</button>
                                        <button class="btn btn-outline-primary" id="position-bottom-right" type="button">Bottom Right</button>
                                        <button class="btn btn-outline-primary" id="position-bottom-full" type="button">Bottom Full Width</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <h4>Inputs</h4>
        <section id="basic-input">
            {{-- Basic Inputs start  --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Basic Inputs</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Basic Input</label>
                                        <input class="form-control" id="basicInput" type="text" placeholder="Enter email" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="helpInputTop">Input text with help</label>
                                        <small class="text-muted">eg.<i>someone@example.com</i></small>
                                        <input class="form-control" id="helpInputTop" type="text" />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="disabledInput">Disabled Input</label>
                                        <input class="form-control" id="disabledInput" type="text" disabled />
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="helperText">With Helper Text</label>
                                        <input class="form-control" id="helperText" type="text" placeholder="Name" />
                                        <p><small class="text-muted">Find helper text here for given textbox.</small></p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 col-12 mb-1 mb-md-0">
                                    <label class="form-label" for="disabledInput">Readonly Input</label>
                                    <input class="form-control" id="readonlyInput" type="text" value="You can't update me :P" readonly="readonly" />
                                </div>
                                <div class="col-xl-4 col-md-6 col-12">
                                    <label class="form-label" for="disabledInput">Readonly Static Text</label>
                                    <p class="form-control-static" id="staticInput">email@pixinvent.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Basic Inputs end  --}}
        </section>
        <div class="row">
            <div class="col">
                {{-- Basic File Browser start  --}}
                <section id="input-file-browser">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">File input</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                            <label class="form-label" for="formFile">Simple file input</label>
                                            <input class="form-control" id="formFile" type="file" />
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label class="form-label" for="formFileMultiple">Multiple files input</label>
                                            <input class="form-control" id="formFileMultiple" type="file" multiple />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Basic File Browser end  --}}
            </div>
            <div class="col">
                {{-- validations start  --}}
                <section class="validations" id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Input Validation States</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>
                                                You can indicate invalid and valid form fields with <code>.is-invalid</code> and <code>.is-valid</code>.
                                                Note that <code>.invalid-feedback</code> is also supported with these classes.
                                            </p>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label" for="valid-state">Valid State</label>
                                            <input class="form-control is-valid" id="valid-state" type="text" value="Valid" placeholder="Valid" required />
                                            <div class="valid-feedback">This is valid state.</div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label" for="invalid-state">Invalid State</label>
                                            <input class="form-control is-invalid" id="invalid-state" type="text" value="Invalid" placeholder="Invalid" required />
                                            <div class="invalid-feedback">This is invalid state.</div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="form-label" for="invalid-state">Invalid State</label>
                                            <input class="form-control is-invalid" id="invalid-state" type="text" value="Invalid" placeholder="Invalid" required />
                                            <div class="invalid-feedback">This is invalid state.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- validations end  --}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{-- Basic group input --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Input Group</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="search"></i></span>
                            <input class="form-control" type="text" aria-label="Search..." aria-describedby="basic-addon-search1" placeholder="Search..." />
                        </div>

                        <label class="form-label" for="basic-default-password">Password</label>
                        <div class="input-group form-password-toggle mb-2">
                            <input class="form-control" id="basic-default-password" type="password" aria-describedby="basic-default-password" placeholder="Your Password" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input class="form-control" type="text" aria-label="Username" aria-describedby="basic-addon1" placeholder="Username" />
                        </div>

                        <div class="input-group mb-2">
                            <input class="form-control" type="text" aria-label="Recipient's username" aria-describedby="basic-addon2" placeholder="Recipient's username" />
                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                            <input class="form-control" id="basic-url3" type="text" aria-describedby="basic-addon3" />
                        </div>

                        <div class="input-group mb-2">
                            <span class="input-group-text">$</span>
                            <input class="form-control" type="text" aria-label="Amount (to the nearest dollar)" placeholder="100" />
                            <span class="input-group-text">.00</span>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">With textarea</span>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                {{-- Merged group input --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Merged Input Group</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-group input-group-merge mb-2">
                            <span class="input-group-text" id="basic-addon-search2"><i data-feather="search"></i></span>
                            <input class="form-control" type="text" aria-label="Search..." aria-describedby="basic-addon-search2" placeholder="Search..." />
                        </div>

                        <label class="form-label" for="basic-default-password1">Password</label>
                        <div class="input-group input-group-merge form-password-toggle mb-2">
                            <input class="form-control" id="basic-default-password1" type="password" aria-describedby="basic-default-password1" placeholder="Your Password" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>

                        <div class="input-group input-group-merge mb-2">
                            <span class="input-group-text" id="basic-addon5">@</span>
                            <input class="form-control" type="text" aria-label="Username" aria-describedby="basic-addon5" placeholder="Username" />
                        </div>

                        <div class="input-group input-group-merge mb-2">
                            <input class="form-control" type="text" aria-label="Recipient's username" aria-describedby="basic-addon6" placeholder="Recipient's username" />

                            <span class="input-group-text" id="basic-addon6">@example.com</span>
                        </div>

                        <div class="input-group input-group-merge mb-2">
                            <span class="input-group-text" id="basic-addon7">https://example.com/users/</span>
                            <input class="form-control" id="basic-url7" type="text" aria-describedby="basic-addon7" />
                        </div>

                        <div class="input-group input-group-merge mb-2">
                            <span class="input-group-text">$</span>
                            <input class="form-control" type="text" aria-label="Amount (to the nearest dollar)" placeholder="100" />
                            <span class="input-group-text">.00</span>
                        </div>

                        <div class="input-group input-group-merge">
                            <span class="input-group-text">With textarea</span>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{-- Inputs Group with Buttons  --}}
                <section id="input-group-buttons">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Input Groups with Buttons</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        Add span with <code>.input-group-btn</code> class and add button inside <b>before</b> or <b>after</b>
                                        <code>&lt;input&gt;</code>.
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-1">
                                            <div class="input-group">
                                                <input class="form-control" type="text" aria-describedby="button-addon2" placeholder="Button on right" />
                                                <button class="btn btn-outline-primary" id="button-addon2" type="button">Go</button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <div class="input-group">
                                                <button class="btn btn-outline-primary" type="button">
                                                    <i data-feather="search"></i>
                                                </button>
                                                <input class="form-control" type="text" aria-label="Amount" placeholder="Button on both side" />
                                                <button class="btn btn-outline-primary" type="button">Search !</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Inputs Group with Buttons end  --}}
            </div>
            <div class="col">
                {{-- Inputs Group with Dropdown  --}}
                <section id="input-group-dropdown">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Input Groups with Dropdown</h4>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Add <code>&lt;button&gt;</code> with <code>.dropdown-toggle</code> class and add dropdown-menu after it to
                                        get input group with dropdown.
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-1">
                                            <fieldset>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider" role="separator"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                    <input class="form-control" type="text" placeholder="Dropdown on left" />
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6 col-12 mb-1">
                                            <fieldset>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <i data-feather="edit-2"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider" role="separator"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                    <input class="form-control" type="text" aria-label="Amount" placeholder="Dropdown on both side" />
                                                    <button class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider" role="separator"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {{-- Inputs Group with Dropdown end  --}}
            </div>
        </div>

        <h4>Textarea</h4>
        <div class="row">
            {{-- Basic Textarea start  --}}
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Default</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">To add a Textarea we have the component <code>textarea</code>.</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="exampleFormControlTextarea1">Textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Textarea"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Basic Textarea end  --}}
            {{-- Floating Label Textarea start  --}}
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Floating Label</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-2">Use <code>.form-floating</code> to add a Floating Label with Textarea.</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px" placeholder="Leave a comment here"></textarea>
                                    <label for="floatingTextarea2">Comments</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Floating Label Textarea end  --}}

            {{-- Counter Textarea start  --}}
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Counter</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-2">
                            There are times when we need the user to only enter a certain number of characters for it, we have the
                            property counter, the value is a number and determines the maximum. Use <code>.char-textarea</code> with
                            <code>&lt;textarea&gt;</code>tag for counting text-length.
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-floating mb-0">
                                    <textarea class="form-control char-textarea" id="textarea-counter" data-length="20" style="height: 100px" rows="3" placeholder="Counter"></textarea>
                                    <label for="textarea-counter">Counter</label>
                                </div>
                                <small class="textarea-counter-value float-end"><span class="char-count">0</span> / 20 </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Counter Textarea end  --}}

        </div>

        <h4>Checkboxes</h4>
        <div class="row">
            <div class="col">
                {{-- basic checkbox start --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Basic Checkboxes</h4>
                    </div>
                    <div class="card-body">
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox1" type="checkbox" value="checked" checked />
                                <label class="form-check-label" for="inlineCheckbox1">Checked</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="unchecked" />
                                <label class="form-check-label" for="inlineCheckbox2">Unchecked</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox3" type="checkbox" value="checked-disabled" checked disabled />
                                <label class="form-check-label" for="inlineCheckbox3">Checked disabled</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineCheckbox4" type="checkbox" value="unchecked-disabled" disabled />
                                <label class="form-check-label" for="inlineCheckbox4">Unchecked disabled</label>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- basic checkbox end --}}
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Color</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-0">
                            To change the color of the checkBox use the <code>.form-check-{value}</code> for primary, secondary,
                            success, danger, info, warning.
                        </p>
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-primary">
                                <input class="form-check-input" id="colorCheck1" type="checkbox" checked />
                                <label class="form-check-label" for="colorCheck1">Primary</label>
                            </div>
                            <div class="form-check form-check-secondary">
                                <input class="form-check-input" id="colorCheck2" type="checkbox" checked />
                                <label class="form-check-label" for="colorCheck2">Secondary</label>
                            </div>
                            <div class="form-check form-check-success">
                                <input class="form-check-input" id="colorCheck3" type="checkbox" checked />
                                <label class="form-check-label" for="colorCheck3">Success</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input class="form-check-input" id="colorCheck5" type="checkbox" checked />
                                <label class="form-check-label" for="colorCheck5">Danger</label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input class="form-check-input" id="colorCheck4" type="checkbox" checked />
                                <label class="form-check-label" for="colorCheck4">Warning</label>
                            </div>
                            <div class="form-check form-check-info">
                                <input class="form-check-input" id="colorCheck6" type="checkbox" checked />
                                <label class="form-check-label" for="colorCheck6">Info</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4>Radio Buttons</h4>
        <div class="row">
            {{-- basic radio button start --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Radio Buttons</h4>
                    </div>
                    <div class="card-body">
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineRadio1" name="inlineRadioOptions" type="radio" value="option1" checked />
                                <label class="form-check-label" for="inlineRadio1">Checked</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineRadio2" name="inlineRadioOptions" type="radio" value="option2" />
                                <label class="form-check-label" for="inlineRadio2">Unchecked</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineRadio3" name="inlineRadioDisabledOptions" type="radio" value="option3" checked disabled />
                                <label class="form-check-label" for="inlineRadio3">Checked disabled</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="inlineRadio4" name="inlineRadioDisabledOptions" type="radio" value="option4" disabled />
                                <label class="form-check-label" for="inlineRadio4">Unchecked disabled</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- basic radio button end --}}

            {{-- radio button color start --}}
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Color</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-0">
                            To change the color of the radio use the <code>.form-check-{value}</code> for primary, secondary, success,
                            danger, info, warning.
                        </p>
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-primary">
                                <input class="form-check-input" id="customColorRadio1" name="customColorRadio1" type="radio" checked />
                                <label class="form-check-label" for="customColorRadio1">Primary</label>
                            </div>
                            <div class="form-check form-check-secondary">
                                <input class="form-check-input" id="customColorRadio2" name="customColorRadio2" type="radio" checked />
                                <label class="form-check-label" for="customColorRadio2">Secondary</label>
                            </div>
                            <div class="form-check form-check-success">
                                <input class="form-check-input" id="customColorRadio3" name="customColorRadio3" type="radio" checked />
                                <label class="form-check-label" for="customColorRadio3">Success</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input class="form-check-input" id="customColorRadio5" name="customColorRadio5" type="radio" checked />
                                <label class="form-check-label" for="customColorRadio5">Danger</label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input class="form-check-input" id="customColorRadio4" name="customColorRadio4" type="radio" checked />
                                <label class="form-check-label" for="customColorRadio4">Warning</label>
                            </div>
                            <div class="form-check form-check-info">
                                <input class="form-check-input" id="customRadio6" name="customColorRadio6" type="radio" checked />
                                <label class="form-check-label" for="customRadio6">Info</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- radio button color end --}}
        </div>

        <h4>Select Options</h4>
        <section class="basic-select2">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Select2 Options</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                {{-- Basic  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-basic">Basic</label>
                                    <select class="select2 form-select" id="select2-basic">
                                        <option value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>
                                        <option value="SD">South Dakota</option>
                                        <option value="TX">Texas</option>
                                        <option value="TN">Tennessee</option>
                                        <option value="WI">Wisconsin</option>
                                        <option value="CT">Connecticut</option>
                                        <option value="DE">Delaware</option>
                                        <option value="FL">Florida</option>
                                        <option value="GA">Georgia</option>
                                        <option value="IN">Indiana</option>
                                        <option value="ME">Maine</option>
                                        <option value="MD">Maryland</option>
                                        <option value="MA">Massachusetts</option>
                                        <option value="MI">Michigan</option>
                                        <option value="NH">New Hampshire</option>
                                        <option value="NJ">New Jersey</option>
                                        <option value="NY">New York</option>
                                        <option value="NC">North Carolina</option>
                                        <option value="OH">Ohio</option>
                                        <option value="PA">Pennsylvania</option>
                                        <option value="RI">Rhode Island</option>
                                        <option value="SC">South Carolina</option>
                                        <option value="VT">Vermont</option>
                                        <option value="VA">Virginia</option>
                                        <option value="WV">West Virginia</option>
                                    </select>
                                </div>

                                {{-- Nested  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-nested">Nested</label>
                                    <select class="select2 form-select" id="select2-nested">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL" selected>Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>

                                {{-- Multiple  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-basic">Multiple</label>
                                    <select class="select2 form-select" id="select2-basic" multiple>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaiibi-</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO" selected>Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL" selected>Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>

                                {{-- Icons  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-icons">Icons</label>
                                    <select class="select2-icons form-select" id="select2-icons" data-placeholder="Select a state...">
                                        <optgroup label="Social Media">
                                            <option data-icon="facebook" value="facebook" selected>Facebook</option>
                                            <option data-icon="twitter" value="twitter">Twitter</option>
                                            <option data-icon="linkedin" value="linkedin">LinkedIN</option>
                                            <option data-icon="github" value="github">GitHub</option>
                                            <option data-icon="instagram" value="instagram">Instagram</option>
                                            <option data-icon="dribbble" value="dribbble">Dribbble</option>
                                            <option data-icon="gitlab" value="gitlab">GitLab</option>
                                        </optgroup>
                                        <optgroup label="File types">
                                            <option data-icon="file" value="pdf">PDF</option>
                                            <option data-icon="file-text" value="word">Word</option>
                                            <option data-icon="image" value="image">Image</option>
                                        </optgroup>
                                        <optgroup label="Other">
                                            <option data-icon="figma" value="figma">Figma</option>
                                            <option data-icon="chrome" value="chrome">Chrome</option>
                                            <option data-icon="command" value="safari">Safari</option>
                                            <option data-icon="slack" value="slack">Slack</option>
                                            <option data-icon="youtube" value="youtube">YouTube</option>
                                        </optgroup>
                                    </select>
                                </div>

                                {{-- Disabled  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label">Disabled</label>
                                    <select class="select2 form-select" disabled>
                                        <option value="1">Option</option>
                                        <option value="2" selected>Option2</option>
                                        <option value="3">Option3</option>
                                        <option value="4">Option4</option>
                                    </select>
                                </div>

                                {{-- Disabled Results  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-disabled-result">Disabled Results</label>
                                    <select class="select2 form-select" id="select2-disabled-result">
                                        <option value="1">Option</option>
                                        <option value="2" disabled>Option2</option>
                                        <option value="3">Option3</option>
                                        <option value="4" disabled>Option4</option>
                                    </select>
                                </div>

                                {{-- Array Data  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-array">Array Data</label>
                                    <div class="mb-1">
                                        <select class="select2-data-array form-select" id="select2-array"></select>
                                    </div>
                                </div>

                                {{-- Remote Data  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-ajax">Remote Data</label>
                                    <div class="mb-1">
                                        <select class="select2-data-ajax form-select" id="select2-ajax"></select>
                                    </div>
                                </div>

                                {{-- Limit Selected Options  --}}
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-limited">Limit Selected Options</label>
                                    <select class="max-length form-select" id="select2-limited" multiple>
                                        <optgroup label="Figures">
                                            <option value="romboid">Romboid</option>
                                            <option value="trapeze" selected>Trapeze</option>
                                            <option value="triangle">Triangle</option>
                                            <option value="polygon">Polygon</option>
                                        </optgroup>
                                        <optgroup label="Colors">
                                            <option value="red">Red</option>
                                            <option value="green">Green</option>
                                            <option value="blue">Blue</option>
                                            <option value="purple">Purple</option>
                                        </optgroup>
                                    </select>
                                </div>

                                {{-- Hide Search Box  --}}
                                <div class="col-md-6 mb-2">
                                    <label class="form-label" for="select2-hide-search">Hide Search Box</label>
                                    <select class="hide-search form-select" id="select2-hide-search">
                                        <optgroup label="Figures">
                                            <option value="romboid">Romboid</option>
                                            <option value="trapeze" selected>Trapeze</option>
                                            <option value="triangle">Triangle</option>
                                            <option value="polygon">Polygon</option>
                                        </optgroup>
                                        <optgroup label="Colors">
                                            <option value="red">Red</option>
                                            <option value="green">Green</option>
                                            <option value="blue">Blue</option>
                                            <option value="purple">Purple</option>
                                        </optgroup>
                                    </select>
                                </div>

                                {{-- Modal Demo  --}}
                                <div class="col-md-6">
                                    {{-- Basic trigger modal  --}}
                                    <div class="basic-modal">
                                        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#select2InModal" type="button">
                                            Select2 In Modal
                                        </button>

                                        {{-- Modal  --}}
                                        <div class="modal fade text-start" id="select2InModal" aria-labelledby="myModalLabel1" aria-hidden="true" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel1">Select2 In Modal</h4>
                                                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>This is Select2 Example in Modal.</p>

                                                        <label class="form-label" for="select2Demo">Select2</label>
                                                        <select class="select2InModal form-select" id="select2Demo">
                                                            <option value="AK">Alaska</option>
                                                            <option value="HI">Hawaii</option>
                                                            <option value="CA">California</option>
                                                            <option value="NV">Nevada</option>
                                                            <option value="OR">Oregon</option>
                                                            <option value="WA">Washington</option>
                                                            <option value="AZ">Arizona</option>
                                                            <option value="CO">Colorado</option>
                                                            <option value="ID">Idaho</option>
                                                            <option value="MT">Montana</option>
                                                            <option value="NE">Nebraska</option>
                                                            <option value="NM">New Mexico</option>
                                                            <option value="ND">North Dakota</option>
                                                            <option value="UT">Utah</option>
                                                            <option value="WY">Wyoming</option>
                                                            <option value="AL">Alabama</option>
                                                            <option value="AR">Arkansas</option>
                                                            <option value="IL">Illinois</option>
                                                            <option value="IA">Iowa</option>
                                                            <option value="KS">Kansas</option>
                                                            <option value="KY">Kentucky</option>
                                                            <option value="LA">Louisiana</option>
                                                            <option value="MN">Minnesota</option>
                                                            <option value="MS">Mississippi</option>
                                                            <option value="MO">Missouri</option>
                                                            <option value="OK">Oklahoma</option>
                                                            <option value="SD">South Dakota</option>
                                                            <option value="TX">Texas</option>
                                                            <option value="TN">Tennessee</option>
                                                            <option value="WI">Wisconsin</option>
                                                            <option value="CT">Connecticut</option>
                                                            <option value="DE">Delaware</option>
                                                            <option value="FL">Florida</option>
                                                            <option value="GA">Georgia</option>
                                                            <option value="IN">Indiana</option>
                                                            <option value="ME">Maine</option>
                                                            <option value="MD">Maryland</option>
                                                            <option value="MA">Massachusetts</option>
                                                            <option value="MI">Michigan</option>
                                                            <option value="NH">New Hampshire</option>
                                                            <option value="NJ">New Jersey</option>
                                                            <option value="NY">New York</option>
                                                            <option value="NC">North Carolina</option>
                                                            <option value="OH">Ohio</option>
                                                            <option value="PA">Pennsylvania</option>
                                                            <option value="RI">Rhode Island</option>
                                                            <option value="SC">South Carolina</option>
                                                            <option value="VT">Vermont</option>
                                                            <option value="VA">Virginia</option>
                                                            <option value="WV">West Virginia</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary" data-bs-dismiss="modal" type="button">Accept</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Basic trigger modal end  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <h4>DataTable</h4>
        <section id="responsive-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Responsive Datatable</h4>
                        </div>
                        {{-- Responsive Datatable  --}}
                        <div class="card-datatable">
                            <table class="dt-responsive table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Post</th>
                                        <th>City</th>
                                        <th>Date</th>
                                        <th>Salary</th>
                                        <th>Age</th>
                                        <th>Experience</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Post</th>
                                        <th>City</th>
                                        <th>Date</th>
                                        <th>Salary</th>
                                        <th>Age</th>
                                        <th>Experience</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{-- / Responsive Datatable  --}}
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
    {{-- <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="/app-assets/js/scripts/tables/table-datatables-advanced.js"></script>  --}}
    {{-- init datatable script --}}

    {{-- Toastr --}}
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="/app-assets/js/scripts/extensions/ext-component-toastr.js"></script> {{-- init toastr script --}}
@endpush
