@extends("layouts.admin")


@section("page_title")
    Data Entry Section
@endsection

@section("title")
    Data Entry Section
@endsection


@section("content")
<div class="row">
    <div class="col-12">
        <div class="card" id="uploader-progress">
        <div class="card-body">
                <div class="form-group mb-3">
                    <select  class="form-control"  name="toUpload" id="toupload">
                        <option value="usertags">User Tags</option>
                        <option value="lookingfor">Looking For tags</option>
                    </select>
                </div>
                <p class="m-3">
                    <input accept=".json" type="file" hidden id="utupload">        
                    <button class="btn btn-primary" id="btnutupload"><i class="fe-upload-cloud mr-1"></i>Bulk Upload </button>
                </p>
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

        function upload(e,router) {
            let file = e.target.files[0]
            if (!file) return;

            $("#btnutupload").removeClass("btn-primary")
            $("#btnutupload").attr("disabled", "true")
            $("#btnutupload").addClass("btn-secondary")
            $("#btnutupload").addClass("disabled")
            $("#btnutupload").html('<i class="fe-upload-cloud mr-1"></i> Uploading')
            
            $("#uploader-progress").html('')
            $("#uploader-progress").append('<h3>Adding Data</h3>')
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
                        data: batch,
                        _token: '{{ csrf_token() }}'
                    }
                    let uploadroute = "{{ route('savetags') }}";
                    //Change Select box value and add a route for where to upload and it is done :)
                    switch (router){
                        case "usertags": 
                            uploadroute = "{{ route('savetags') }}"
                            break;
                        case "lookingfor":
                            uploadroute = "{{ route('saveLookingfor') }}"
                            break;
                    }
                    let x = await new Promise(function(resolve) {
                        $.ajax({
                            url: uploadroute,
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
                    // location.reload(true)
                } else {
                    $("#btnutupload").html('<i class="ti-face-sad mr-1"></i> Error')

                }
                                
            }

            c.readAsText(file)   
            
        }
</script>
<script>
        $("#btnutupload").click(function (e) {
            $("#utupload").click()
        })
        $("#utupload").change(function(e) {
            var value = document.getElementById("toupload").value;
            console.log(value)
            upload(e,value)
        });
</script>
@endsection