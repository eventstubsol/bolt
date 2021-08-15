@extends("layouts.admin")

@section("page_title")
    Create Agenda
@endsection

@section("title")
    Create Agenda
@endsection

@section("styles")
    @include("includes.styles.select")
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("subscriptions.index") }}">Agendas</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
        <p class="text-right m-3">
            <input accept=".json" type="file" hidden id="fileUpload">        
            <button class="btn btn-primary" id="btnFileUpload"><i class="fe-upload-cloud mr-1"></i> Bulk Upload</button>
        </p>
            <div class="card-body">
                <form action="{{ route("subscriptions.store") }}" method="post" id="userForm">
                    {{ csrf_field() }}
                    <div class="mb-3">
                          <label for="user">Select User</label>
                          <select class="form-control @error('userids') is-invalid @enderror" id="user" name="userid" data-toggle="select"  data-placeholder="Choose ..." required>
                              @foreach($users as $user)
                                <option value={{$user->id}}>{{$user->name}} ({{$user->email}}) </option>
                              @endforeach
                          </select>
                           @error('userids')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="mb-3">
                          <label for="session">Select Session</label>
                          <select class="form-control select2-multiple @error('userids') is-invalid @enderror" id="session" name="sessionids[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." required>
                              @foreach($sessions as $session)
                                <option value={{$session->id}}>{{$session->name}} ({{$session->room}}) </option>
                              @endforeach
                          </select>
                           @error('sessionids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                       </div>

                  



                    <div>
                        <input class="btn btn-primary" type="submit" value="Create" />
                    </div>
                </form>
                <div id="uploader-progress" style="display: none">
                    <h3>Creating Personal Agenda</h3>
                </div>
            </div>
        </div>
    </div>
</div>
            

@endsection

@section("scripts")
    @include("includes.scripts.select")
    <script>
    function csvTojs(csv) {
            var lines=csv.split("\n");
            var result = [];
            var headers = lines[0].split(",");

        for(var i=1; i<lines.length; i++) {
            var obj = {};

            var row = lines[i],
            queryIdx = 0,
            startValueIdx = 0,
            idx = 0;

            if (row.trim() === '') { continue; }

            while (idx < row.length) {
            /* if we meet a double quote we skip until the next one */
            var c = row[idx];

            if (c === '"') {
                do { c = row[++idx]; } while (c !== '"' && idx < row.length - 1);
            }

            if (c === ',' || /* handle end of line with no comma */ idx === row.length - 1) {
                /* we've got a value */
                var value = row.substr(startValueIdx, idx - startValueIdx).trim();

                /* skip first double quote */
                if (value[0] === '"') { value = value.substr(1); }
                /* skip last comma */
                if (value[value.length - 1] === ',') { value = value.substr(0, value.length - 1); }
                /* skip last double quote */
                if (value[value.length - 1] === '"') { value = value.substr(0, value.length - 1); }

                var key = headers[queryIdx++];
                obj[key] = value;
                startValueIdx = idx + 1;
            }

            ++idx;
            }

            result.push(obj);
            }
            return result;
        }

        function sleep(ms) {
            return new Promise(function(resolve) {
                setTimeout(resolve, ms)
            })
        } 
</script>
<script>
        $("#btnFileUpload").click(function (e) {
            $("#fileUpload").click()
        })

        $("#fileUpload").change(function(e) {
            
            let file = e.target.files[0]
            if (!file) return;

            $("#btnFileUpload").removeClass("btn-primary")
            $("#btnFileUpload").attr("disabled", "true")
            $("#btnFileUpload").addClass("btn-secondary")
            $("#btnFileUpload").addClass("disabled")
            $("#btnFileUpload").html('<i class="fe-upload-cloud mr-1"></i> Uploading')
            
            $("#uploader-progress").html('')
            $("#uploader-progress").append('<h3>Creating Users</h3>')
            $("#userForm").hide()
            $("#uploader-progress").show()

            let c = new FileReader();

            c.onloadend = async function (e) {
                let batches = JSON.parse(c.result);

                batches = batches
                    .map(function(user){
                        return {
                            ...user,
                            email: user.email.split(/\//gmi)[0].trim().toLowerCase()
                        }

                    })
                        .filter(v => !!v.email);

                let total = batches.length;
                let $data = []
                let i,j,k=0,chunk=10;

                for (i=0,j=batches.length; i<j; i+=chunk) {
                    $data.push(batches.slice(i,i+chunk))
                }
                batches = $data;
                delete $data;
                let flag = true;
                for (const batch of batches) {
                    window.scrollTo(0,document.body.scrollHeight);
                    $("#uploader-progress").append("<p style='font-family: monospace;'>[!] Uploading <strong>" + batch.length + "</strong> users.</p>")
                    let data = {
                        users: batch,
                        _token: '{{ csrf_token() }}'
                    }
                    let x = await new Promise(function(resolve) {
                        $.ajax({
                            url: '{{ route("subscriptions.bulk_upload") }}',
                            method: "POST",
                            data,
                            success: function(e) {
                                resolve(e)
                            },
                            error: function (e) {
                                resolve({success:false, message: e.responseJSON.message.replace(/\\r?\\n?/, ". ")})
                            }
                        })
                    })
                    
                    flag = x.success
                    if(x.success) {
                        k += batch.length
                        $("#uploader-progress").append("<p style='font-family: monospace; color: green'>[#] Done <strong>" + k + "/" + total +"</strong></p>")
                    } else {
                        $("#uploader-progress").append("<p style='font-family: monospace; color: red'>[x] Error: <strong>" + x.message + "</strong></p>")
                        $("#uploader-progress").append("<p style='font-family: monospace; color: red'>[!] Please reload the page</p>")
                        break;
                    }
                }

                if (flag) {
                    $("#uploader-progress").append("<h3>All Done</h3>")
                } else {
                    $("#btnFileUpload").html('<i class="ti-face-sad mr-1"></i> Error')

                }
                                
            }

            c.readAsText(file)
            
        })
</script>
@endsection