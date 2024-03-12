@extends('admin.layout')
@section('body')
    <div class="span9">
        <div class="content">

            <div class="module">
                <div class="module-head">
                    <h3>Add Product</h3>
                </div>
                <div class="module-body">
                    <form class="form-horizontal row-fluid" action="add-product" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Name</label>
                            <div class="controls">
                                <input type="text" name="name" required id="basicinput" placeholder="Name product"
                                    class="span8">
                                {{-- <span class="help-inline">Minimum 5 Characters</span> --}}
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" required for="basicinput">Category</label>
                            <div class="controls">
                                <div class="form-group">
                                    <select class="form-control" required name="category" id="exampleFormControlSelect1">
                                        <option value="Gemstone">Gemstone</option>
                                        <option value="Sliver">Sliver</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Diamond">Diamond</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Discription</label>
                            <div class="controls">
                                <input name="description" required data-title="A tooltip for the input" type="text"
                                    placeholder="Description Product" data-original-title="" class="span8 tip">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Choose Images</label>
                            <div class="controls">
                                <label class="radio">
                                    <input type="file" required name="image1" name="optionsRadios" id="inputFile1"
                                        value="option1" checked="">

                                    <img id="image1" src="{{ asset('public/frontend/images/box.png') }}"
                                        style="150; height:100px; border-radius:30%; margin-left: 20%;"><img>
                                </label>
                                <br>
                                <label class="radio">
                                    <input type="file" required name="image2" name="optionsRadios" id="inputFile2"
                                        value="option1" checked="">

                                    <img id="image2" required src="{{ asset('public/frontend/images/box.png') }}"
                                        style="150px; height:100px; border-radius:30%;margin-left: 20%;"><img>
                                </label>
                                <br>
                                <label class="radio">
                                    <input type="file" required name="image3" name="optionsRadios" id="inputFile3"
                                        value="option1" checked="">

                                    <img id="image3" src="{{ asset('public/frontend/images/box.png') }}"
                                        style="150px; height:100px; border-radius:30%;margin-left: 20%;"><img>
                                </label>
                                <br>
                                <label class="radio">
                                    <input type="file" required name="image4" name="optionsRadios" id="inputFile4"
                                        value="option1" checked="">

                                    <img id="image4" src="{{ asset('public/frontend/images/box.png') }}"
                                        style="150px; height:100px; border-radius:30%;margin-left: 20%;"><img>
                                </label>
                                <br>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                var inputFile1 = $('#inputFile1');
                                var image1 = $('#image1');

                                var inputFile2 = $('#inputFile2');
                                var image2 = $('#image2');
                                var inputFile3 = $('#inputFile3');
                                var image3 = $('#image3');
                                var inputFile4 = $('#inputFile4');
                                var image4 = $('#image4');
                                $("#inputFile1").change(function() {
                                    var file = this.files[0];
                                    console.log(file);
                                    if (file) {
                                        var reader = new FileReader();
                                        reader.addEventListener("load", function() {
                                            console.log(this);
                                            image1.attr("src", this.result);
                                        });
                                        reader.readAsDataURL(file);
                                        image1.width(150).height(100);
                                    }
                                });
                                $("#inputFile2").change(function() {
                                    var file = this.files[0];
                                    console.log(file);
                                    if (file) {
                                        var reader = new FileReader();
                                        reader.addEventListener("load", function() {
                                            console.log(this);
                                            image2.attr("src", this.result);
                                        });
                                        reader.readAsDataURL(file);
                                        image2.width(150).height(100);
                                    }
                                });
                                $("#inputFile3").change(function() {
                                    var file = this.files[0];
                                    console.log(file);
                                    if (file) {
                                        var reader = new FileReader();
                                        reader.addEventListener("load", function() {
                                            console.log(this);
                                            image3.attr("src", this.result);
                                        });
                                        reader.readAsDataURL(file);
                                        image3.width(150).height(100);
                                    }
                                });
                                $("#inputFile4").change(function() {
                                    var file = this.files[0];
                                    console.log(file);
                                    if (file) {
                                        var reader = new FileReader();
                                        reader.addEventListener("load", function() {
                                            console.log(this);
                                            image4.attr("src", this.result);
                                        });
                                        reader.readAsDataURL(file);
                                        image4.width(150).height(100);
                                    }
                                });

                            });

                        </script>
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Quantity</label>
                            <div class="controls">
                                <div class="input-prepend">
                                    <span class="add-on">#</span><input name="quantity" required class="span8" type="number"
                                        placeholder="Quantity">
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Price</label>
                            <div class="controls">
                                <div class="input-append">
                                    <input name="price" type="text" required placeholder="5.000" class="span8"><span
                                        class="add-on">$</span>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit " class="btn btn-success">Submit Form</button>
                            </div>
                        </div>
                        @if ($notice = Session::get('notice'))
                            {!! $notice !!}
                        @endif
                    </form>
                </div>
            </div>




        </div>
        <!--/.content-->
    </div>
    <!--/.span9-->
@endsection
