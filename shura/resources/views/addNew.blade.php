<h3>Add New Employee</h3>
              <br>
            <form action="addNewEmp" method="POST">
             {{csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" value="{{Request::old('name')}}"id="inputName" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group {{ $errors->has('username') ? 'has-error':''}} col-md-6">
                    <label for="inputUserName">UserName</label>
                    <input type="text" class="form-control" value="{{Request::old('username')}}"id="inputUserName" name="username" placeholder="UserName"required>
                     </div>
                     <div class="form-group {{ $errors->has('password') ? 'has-error':''}} col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" value="{{Request::old('password')}}"id="inputPassword4"name="password" placeholder="Password"required>
                    </div>

                <div class="form-group col-md-6">
                    <label for="inputTitle">Title</label>
                    <input type="text" class="form-control" value="{{Request::old('title')}}"id="inputTitle"name="title" placeholder="Enter Title"required>
                </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputBirth">Birth Date</label>
                    <input type="date" class="form-control" value="{{Request::old('birth_date')}}"id="inputBirth" name="birth_date" required>
                    </div>
                    <div class="form-group col-md-3">
                    <label for="inputChild">No of children</label>
                    <input type="number"  class="form-control" value="{{Request::old('no_of_childrens')}}"id="inputChild"  name="no_of_childrens"min='0'required>
                    </div>
                    <div class="form-group col-md-3">
                     <label for="inputSub">Supervisor ID</label>
                     <input type="number"  class="form-control" value="{{Request::old('sub_id')}}"id="inputSub"name="sub_id" min='0'required>
                    </div>
                    <div class="col-md-12 ">

                            @if(count($errors))
                             <div class="alert alert-danger">
                                <ul style="list-style-type:none;">
                                @foreach($errors->all() as $error)
                                <li > {{$error}}</li>
                                @endforeach
                                </ul>
                             </div>
                            @endif
                                  <!-- alert -->
                                  @if($message=Session::get('e'))
      <div class="alert alert-success">
  <strong>done Added !!</strong>

</div>
      @endif
                                  <!--  -->
                    <button type="submit" class="btn btn-primary ">Add</button>

                     </div>
                </div>

        </form>
