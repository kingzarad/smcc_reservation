<div>
    <style>
        .input-group-custom input {
            width: 300px;
            border: none !important;
            border-bottom: 1px solid #333 !important;
        }

        .signature {
            margin: 20px 20px 20px 60px;
        }

        .signature input {
            width: 200px;
            border: none !important;
            border-bottom: 1px solid #333 !important;
        }

        .signature input[type=text] {
            text-align: center
        }

        .scroll {
            border: 1px solid #ccc;
            padding: 5px;
            max-height: 500px;

            /* Adjust based on your needs */
            overflow-y: auto;
            /* Enables vertical scrolling */
        }

        @media (max-width: 768px) {

            /* Adjusts for devices like tablets */
            .scroll {
                max-height: 300px;
                /* Smaller max-height for smaller devices */
            }
        }

        @media (max-width: 480px) {

            /* Adjusts for devices like mobile phones */
            .scroll {
                max-height: 200px;
                /* Even smaller max-height for mobile devices */
            }
        }
    </style>
    <div class="container scroll border p-5">

        <div class="row" style="width: 1000px !important;">
            <div class="col-lg-12">
                <div class=" d-flex justify-content-center align-items-center">
                    <div>
                        <img src="{{ asset('assets/images/smcc-logo.png') }}" class="h-logo img-fluid blur-up lazyload"
                            style="max-width:120px !important; " alt="logo">
                    </div>
                    <div class="text-center">
                        <h3 style="font-family: 'Times New Roman', Times, serif;"><strong>SAINT MICHAEL COLLEGE OF
                                CARAGA</strong></h3>
                        <p>
                            Brgy. 4, Nasipit, Agusan del Norte, Caraga Region <br>
                            Tel. Nos. ( 085 ) 343-3251; ( 085 ) 283-3113
                        </p>
                        <h3><strong>PROPERTY MANAGMENT OFFICE</strong></h3>
                        <h4 style="font-family: 'Times New Roman', Times, serif;">PERMIT TO USE FORM (Requestor's
                            Copy)👈🏻
                        </h4>
                    </div>
                </div>

            </div>
            <div class="col-lg-12 mt-3">
                <div class="container-fluid   d-flex justify-content-center align-items-center">
                    <div class="row " style="width: 50rem !important">
                        <div class="col-lg-12">
                            <div class="input-group-custom">
                                <label for="">
                                    DATE FILED:
                                </label>
                                <input type="text"
                                    value="{{ \Carbon\Carbon::parse($details->date_filled)->format('F j, Y') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col">

                                    <div class="input-group-custom">
                                        <label for="">
                                            NAME:
                                        </label>
                                        <input
                                            value=" {{ Str::ucfirst($users->firstname ?? '?') }} {{ Str::ucfirst($users->middlename ?? '') }}{{ Str::ucfirst($users->lastname ?? '') }}"
                                            style="margin-left: 25px !important;" type="text">
                                    </div>
                                </div>
                                <div class="col">

                                    <div class="input-group-custom">
                                        <label for="">
                                            POSITION:
                                        </label>
                                        <input value=" {{ Str::ucfirst($users->positionDetails->position_name) }}"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="input-group-custom">
                                <label for="">
                                    DEPT:
                                </label>
                                <input value=" {{ Str::ucfirst($users->departmentDetails->department_name) }}"
                                    style="margin-left: 30px !important;" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                           <span> {{ $venueString }}</span>
                        </div>
                        <div class="col-lg-12">

                            <div class="input-group-custom">

                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="input-group-custom">
                                <label for="">
                                    PURPOSE:
                                </label>
                                <input value=" {{ Str::ucfirst($details->purpose) }}" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12 row">
                            <div class="col">
                                <label for="">
                                    INSIDE THE SCHOOL
                                </label>
                                @if ($details->school_premises == 1)
                                    <i class="fa-regular fa-square-check"></i>
                                @else
                                    <i class="fa-regular fa-square"></i>
                                @endif

                            </div>
                            <div class="col">
                                <label for="">
                                    OUTSIDE THE SCHOOL
                                </label>
                                @if ($details->school_premises == 0)
                                    <i class="fa-regular fa-square-check"></i>
                                @else
                                    <i class="fa-regular fa-square"></i>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="d-flex  justify-content-evenly align-items-center">
                                <div class="input-group-custom d-flex  justify-content-evenly align-items-center">
                                    <label for="">
                                        DATE USAGE:
                                    </label>
                                    <input value=" {{ \Carbon\Carbon::parse($details->date_from)->format('F j, Y') }}"
                                        style="width: 180px !important" type="text">
                                </div>
                                &nbsp;
                                <div class="input-group-custom d-flex">
                                    <label for="">
                                        TO:
                                    </label>
                                    <input value=" {{ \Carbon\Carbon::parse($details->date_to)->format('F j, Y') }}"
                                        style="width: 180px !important" type="text">
                                </div>
                                &nbsp;
                                <div class="input-group-custom d-flex">
                                    <label for="">
                                        DATE RETURN:
                                    </label>
                                    <input
                                        value=" {{ \Carbon\Carbon::parse($details->date_return)->format('F j, Y') }}"
                                        style="width: 180px !important" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="d-flex">
                                <div class="input-group-custom d-flex  justify-content-evenly align-items-center">
                                    <label for="">
                                        TIME USAGE:
                                    </label>
                                    <input value=" {{ \Carbon\Carbon::parse($details->time_from)->format('h:i A') }}"
                                        style="width: 185px !important" type="text">
                                </div>
                                &nbsp;
                                <div class="input-group-custom d-flex">
                                    <label for="">
                                        TO:
                                    </label>
                                    <input value=" {{ \Carbon\Carbon::parse($details->time_to)->format('h:i A') }}"
                                        style="width: 185px !important" type="text">
                                </div>
                                &nbsp;
                                <div class="input-group-custom d-flex">
                                    <label for="">
                                        TIME RETURN:
                                    </label>
                                    <input value=" {{ \Carbon\Carbon::parse($details->time_return)->format('h:i A') }}"
                                        style="width: 185px !important" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">

                            <div class="input-group-custom">
                                <label for="">
                                    FACILITIES TO BE USED:
                                </label>

                                <span>{{ $itemsString }}</span>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="input-group-custom">
                                <label for="">
                                    REMARKS:
                                </label>
                                <input type="text" {{ Str::ucfirst($details->remarks) }}>
                            </div>
                        </div>

                        <div class="col-lg-12">

                            <div class="row  signature">
                                <div class="col-sm-12">
                                    <img src="{{ asset('storage/' . $details->signature) }}"
                                        class="h-logo img-fluid blur-up lazyload"
                                        style="max-width:220px !important; margin-bottom: -20px; " alt="logo">
                                </div>
                                <div class="col-sm-12">
                                    <input type="text"
                                        value="{{ Str::ucfirst($users->firstname ?? '?') }}{{ Str::ucfirst($users->middlename ?? '') }} {{ Str::ucfirst($users->lastname ?? '') }}">
                                </div>
                                <div class="col-sm-12">
                                    <label for="">
                                        Signature over Printed Name
                                    </label>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label for="">
                                Verified by:
                            </label>
                        </div>

                        <div class="col-lg-12">

                            <div class="row  signature">

                                <div class="col-sm-12">
                                    <input type="text" value="ENGR. MANUEL F. JAMINAL">
                                </div>
                                <div class="col-sm-12">
                                    <label for="" style="margin-left: 60px">
                                        <strong> PMO HEAD</strong>
                                    </label>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
