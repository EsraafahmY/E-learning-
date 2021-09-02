<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ url('/favicon.ico" type="image/x-icon') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ url('/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ url('/plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ url('/css/themes/all-themes.css') }}" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@include('shared.nav')
@include('shared.sidNav')
<section class="content">
    <div class="container-fluid">
        <a href='{{ url('/ShowLesson/' . session()->get('current_lesson')) }}'
            class='btn btn-warning m-r-1em waves-effect '>
            <i class="material-icons">keyboard_arrow_left</i>
            <span>Back to lesson</span>
        </a>
        <div class="row clearfix">

            
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h3>Preview</h3>
                        </div>
                        <div class="body">
                            <video id="preview" width="100%" autoplay></video><br /><br />
                            <div class="btn-group">
                                <div id="startButton" class="btn btn-success"> Start </div>
                                <div id="stopButton" class="btn btn-danger" style="display:none;"> Stop </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6" id="recorded" style="display:none">
                    <div class="card ">
                        <div class="header">
                            <h3>Recording</h3>
                        </div>
                        <div class="body">
                            <video id="recording" width="100%" controls></video><br /><br />
                            <a id="downloadButton" class="btn btn-primary"
                                data-url="{{ route('videos.store') }}">save</a>
                            <a id="downloadLocalButton" class="btn btn-primary">Download</a>
                        </div>

                    </div>

                </div>
            </div>





        </div>
    </div>
</section>
<script>
    let preview = document.getElementById("preview");
    let recording = document.getElementById("recording");
    let startButton = document.getElementById("startButton");
    let stopButton = document.getElementById("stopButton");
    let downloadButton = document.getElementById("downloadButton");
    let logElement = document.getElementById("log");
    let recorded = document.getElementById("recorded");
    let downloadLocalButton = document.getElementById("downloadLocalButton");

    let recordingTimeMS = 10000; //video limit 10 sec
    var localstream;

    window.log = function(msg) {
        //logElement.innerHTML += msg + "\n";
        console.log(msg);
    }

    window.wait = function(delayInMS) {
        return new Promise(resolve => setTimeout(resolve, delayInMS));
    }

    window.startRecording = function(stream, lengthInMS) {
        let recorder = new MediaRecorder(stream);
        let data = [];

        recorder.ondataavailable = event => data.push(event.data);
        recorder.start();
        log(recorder.state + " for " + (lengthInMS / 1000) + " seconds...");

        let stopped = new Promise((resolve, reject) => {
            recorder.onstop = resolve;
            recorder.onerror = event => reject(event.name);
        });

        let recorded = wait(lengthInMS).then(
            () => recorder.state == "recording" && recorder.stop()
        );

        return Promise.all([
                stopped,
                recorded
            ])
            .then(() => data);
    }

    window.stop = function(stream) {
        stream.getTracks().forEach(track => track.stop());
    }
    var formData = new FormData();
    if (startButton) {
        startButton.addEventListener("click", function() {
            startButton.innerHTML = "recording...";
            recorded.style.display = "none";
            stopButton.style.display = "inline-block";
            downloadButton.innerHTML = "rendering..";
            navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: true
                }).then(stream => {
                    preview.srcObject = stream;
                    localstream = stream;
                    //downloadButton.href = stream;
                    preview.captureStream = preview.captureStream || preview.mozCaptureStream;
                    return new Promise(resolve => preview.onplaying = resolve);
                }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
                .then(recordedChunks => {
                    let recordedBlob = new Blob(recordedChunks, {
                        type: "video/webm"
                    });
                    recording.src = URL.createObjectURL(recordedBlob);

                    formData.append('_token', document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'));
                    formData.append('video', recordedBlob);

                    downloadLocalButton.href = recording.src;
                    downloadLocalButton.download = "RecordedVideo.webm";
                    log("Successfully recorded " + recordedBlob.size + " bytes of " +
                        recordedBlob.type + " media.");
                    startButton.innerHTML = "Start";
                    stopButton.style.display = "none";
                    recorded.style.display = "block";
                    downloadButton.innerHTML = "Save";
                    localstream.getTracks()[0].stop();
                })
                .catch(log);
        }, false);
    }
    if (downloadButton) {
        downloadButton.addEventListener("click", function() {
            $.ajax({
                url: this.getAttribute('data-url'),
                method: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(res) {
                    if (res.success) {
                        location.reload();
                    }
                }
            });
        }, false);
    }
    if (stopButton) {
        stopButton.addEventListener("click", function() {
            stop(preview.srcObject);
            startButton.innerHTML = "Start";
            stopButton.style.display = "none";
            recorded.style.display = "block";
            downloadButton.innerHTML = "Save";
            localstream.getTracks()[0].stop();
        }, false);
    }
</script>
@include('shared.footer')
