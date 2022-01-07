function notify(type,message){
    toastr.options = {
        "progressBar": true,
        "showDuration": "800"
    }
    toastr[type](message);
}

function deletePost(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#delete-post-button').html('Siliniyor...');
    $.ajax({
        type:'GET',
        url: "delete-post/"+id,
        success: function(data){
            $('#delete-post-button').html('Sil');
            $("#post-"+id).remove();
            notify('success',data.msg);
        },
        error: function(data){
            $('#delete-post-button').html('Sil');
            notify('error',data.responseJSON.msg);
        }
    });
}

function loadmoredata(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#btn-more').html('Yükleniyor...');
    $.ajax({
        type:'GET',
        url: "loadmoredata/"+id,
        cache:false,
        contentType: false,
        processData: false,
        success: function(data){
            $('#remove-row').remove();
            $("#load-data").append(data.posts);
            $('#btn-more').html('Daha Fazla Yükle');
            
        },
        error: function(data){
            $('#btn-more').html('Daha Fazla Yükle');
        }
    });
}

$(document).ready(function() {
    $('#profile-update').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#profile-update-button').html('Güncelleniyor...');
        $.ajax({
            type:'POST',
            url: "profile-update",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#profile-update-button').html('Güncelle');
                notify('success',data.msg);
            },
            error: function(data){
                $('#profile-update-button').html('Güncelle');
                notify('error',data.responseJSON.msg);
            }
        });
    });
    $('#settings-update').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#settings-update-button').html('Güncelleniyor...');
        $.ajax({
            type:'POST',
            url: "settings-update",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#settings-update-button').html('Güncelle');
                notify('success',data.msg);
            },
            error: function(data){
                $('#settings-update-button').html('Güncelle');
                notify('error',data.responseJSON.msg);
            }
        });
    });
    $('#add-post').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add-post-button').html('Ekleniyor...');
        $.ajax({
            type:'POST',
            url: "add-post",
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                var kutu = document.getElementById('post-kutu');
                var div = '<div '
                +'class="card card col-md-4 mt-3">'
                +'<img class="card-img-top mt-3"'
                +'src="'
                +window.location.protocol+'//'+window.location.hostname+'/'+data.src
                +'"'
                +'alt="Card image cap">'
                +'<div class="card-body">'
                +'<h5 class="card-title text-center"><b>'
                +data.title
                +'</b></h5>'
                +'<p class="text-center">Düzenlemek için lütfen sayfayı yenileyin</p></div></div>';
                $("#post-kutu").prepend(div);
                kutu.style.display = '';
                $('#add-post-button').html('Ekle');
                notify('success',data.msg);
            },
            error: function(data){
                $('#add-post-button').html('Ekle');
                notify('error',data.responseJSON.msg);
            }
        });
    });
    $('#update-post').submit(function(e) {
        var id = document.getElementById('update-id').value;
        e.preventDefault();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#info-update-button').html('Güncelleniyor...');
        $.ajax({
            type:'POST',
            url: id,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#update-post-button').html('Güncelle');
                notify('success',data.msg);
            },
            error: function(data){
                $('#update-post-button').html('Güncelle');
                notify('error',data.responseJSON.msg);
            }
        });
    });
    


    $("#btn-edit").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '/tasks/' + $("#frmEditTask input[name=task_id]").val(),
            data: {
                task: $("#frmEditTask input[name=task]").val(),
                description: $("#frmEditTask input[name=description]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditTask').trigger("reset");
                $("#frmEditTask .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-task-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-task-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show();
            }
        });
    });
    $("#btn-delete").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: '/tasks/' + $("#frmDeleteTask input[name=task_id]").val(),
            dataType: 'json',
            success: function(data) {
                $("#frmDeleteTask .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});

function addTaskForm() {
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#addTaskModal').modal('show');
    });
}

function editTaskForm(task_id) {
    $.ajax({
        type: 'GET',
        url: '/tasks/' + task_id,
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#frmEditTask input[name=task]").val(data.task.task);
            $("#frmEditTask input[name=description]").val(data.task.description);
            $("#frmEditTask input[name=task_id]").val(data.task.id);
            $('#editTaskModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteTaskForm(task_id) {
    $.ajax({
        type: 'GET',
        url: '/tasks/' + task_id,
        success: function(data) {
            $("#frmDeleteTask #delete-title").html("Delete Task (" + data.task.task + ")?");
            $("#frmDeleteTask input[name=task_id]").val(data.task.id);
            $('#deleteTaskModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}