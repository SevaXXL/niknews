<!DOCTYPE html>
<html lang="ru">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<title>Фото</title>
<link rel="stylesheet" href="/templates/admin/css/bootstrap.min.css">
<link rel="stylesheet" href="/templates/admin/css/bootstrap-responsive.min.css">
<style>
  body {
    margin-top: 2em;
  }
  #image-area {
    height: 120px;
    background-color: #f5f5f5;
    border: 6px dotted #999;
  }
  #image-area img {
    max-height: 120px;
  }
  .form-actions {
    background-color: transparent;
  }
  .table tr {
    background-color: #f5f5f5;
  }
  .table td {
    padding-top: 1em;
    width: 8%;
  }
  .table td.caption {
    width: 53%;
  }
  .table td.credit {
    width: 15%;
  }
</style>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>

<div class="container-fluid">

  <!-- Форма загрузки фото -->
  <div class="row-fluid">
    <div class="span1">
      <a class="btn btn-mini" href="../"><i class="icon-backward"></i> Назад</a>
    </div>
    <div class="span10">
      <form method="post" action="/upload/" class="form-horizontal" enctype="multipart/form-data">
        <div class="control-group">
          <label class="control-label"><div id="image-area" class="text-center"></div></label>
          <div class="controls">
            <p><a href="#" class="btn btn-warning" id="input-file"><i class="icon-folder-open icon-white"></i> Выбрать файл</a></p>
            <div id="file-info"></div>
            <input type="file" name="fupload" class="hide">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputCaption">Подпись</label>
          <div class="controls">
            <input type="text" name="caption" id="inputCaption" class="input-block-level">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputCredit">Источник</label>
          <div class="controls">
            <input type="text" name="credit" id="inputCredit" class="input-medium">
          </div>
        </div>
        <input type="hidden" name="entryid" value="{{ $smarty.get.id }}">
        <div class="form-actions">
          <button type="submit" class="btn btn-large btn-primary" id="main-button" disabled>Добавить</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Формы редактирования фото -->
  <div class="row-fluid">
    <div class="span12">
      <table class="table">
{{ foreach from=$photos item=value }}
        <form action="/upload/">
          <tr data-imgid="{{ $value.imgid }}">
            <td>
              <div class="btn-group">
                <a class="btn btn-danger btn-mini dropdown-toggle" data-toggle="dropdown"><i class="icon-trash icon-white"></i> Удалить</a>
                <ul class="dropdown-menu">
                  <li><a href="/upload/?delete={{ $value.imgid }}&amp;mainphoto={{ $mainphoto }}&amp;entryid={{ $smarty.get.id }}">Вы уверены?</a></li>
                </ul>
              </div>
            </td>
            <td>{{ if $value.imgid == $mainphoto }}<a href="#" class="btn btn-mini btn-primary disabled"><i class="icon-check icon-white"></i> Главная</a>{{ else }}<a href="/upload/?new_mainphoto={{ $value.imgid }}&amp;entryid={{ $smarty.get.id }}" class="btn btn-mini">Назначить</a>{{ /if }}</td>
            <td><a href="/files/fullsize/part{{ $value.part }}/{{ $value.imgid }}.{{ $value.ext }}"><img src="/files/part{{ $value.part }}/{{ $value.imgid }}-75x75.{{ $value.ext }}" alt="Открыть оригинал"></a></td>
            <td class="caption"><input type="text" name="caption" class="input-block-level onchange" value="{{ $value.caption }}"></td>
            <td class="credit"><input type="text" name="credit" class="input-block-level onchange" value="{{ $value.credit }}"></td>
            <td>
              <input type="hidden" name="imgid" value="{{ $value.imgid }}">
              <button class="btn btn-success" type="submit" disabled>Сохранить</button>
            </td>
          </tr>
        </form>
{{ /foreach }}
      </table>
    </div>
  </div>

  <!-- Блок для кнопки сохранения нового порядка сортировки -->
  <div class="text-center" id="new-sort"></div>

</div><!-- /.container -->

<script src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
<script src="/templates/admin/js/jquery.tablednd.js"></script>
<script src="/templates/admin/js/bootstrap.dropdowns.min.js"></script>

<script>

$(document).ready(function() {

  // Сортировка строк таблицы
  $('table').tableDnD({
    onDrop: function(table, row) {
      var $data = $(table).find('tr');
      var sort = [];
      $.each($data, function() {
        sort.push($(this).data('imgid'));
      });
      $('#new-sort').html('<a href="/upload/?sort=' + sort.join('_') + '" class="btn">Запомнить новый порядок</a>');
    }
  });

  // Предварительный просмотр загружаемого файла
  var reader = new FileReader();
  reader.onload = function(event) {
    var dataUri = event.target.result,
        img     = document.createElement("img");
    img.src = dataUri;
    $('#image-area').html($(img));
  };
  reader.onerror = function(event) {
    console.error("File could not be read! Code " + event.target.error.code);
  };

  var $input_file_button = $('#input-file'),
      $input_file_form   = $('input[name="fupload"]');

  $input_file_button.click(function() {
    $input_file_form.click();
  });
  $input_file_form.bind({
    change: function() {
      $('#main-button').removeAttr('disabled');
      $('#file-info').html('<p>' + this.files[0].name + '</p><p>' + Math.ceil(this.files[0].size / 1000) + ' Кб</p>');
      reader.readAsDataURL(this.files[0]);
    }
  });

  $('.onchange').focus(function() {
    $(this).closest('tr').find('button').removeAttr('disabled');
  });

  // Загрузка без ajax работает только в Chrome
  $('#image-area').bind({
   dragenter: function() {
        return false;
    },
    dragover: function() {
        return false;
    },
    dragleave: function() {
        return false;
    },
    drop: function(e) {
      var dt = e.originalEvent.dataTransfer;
      $('#main-button').removeAttr('disabled');
      $('#file-info').html('<p>' + dt.files[0].name + '</p><p>' + Math.ceil(dt.files[0].size / 1000) + ' Кб</p>');
      $('input[type="file"]').prop('files', dt.files[0]);
      reader.readAsDataURL(dt.files[0]);
      return false;
    }
  });

});
</script>

</body>
</html>

