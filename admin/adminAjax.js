<script type="text/javascript">
  $(document).ready(function()
  {$("#insertColor").click(function (e) {
    e.preventDefault();
    $.ajax({
      method: "post",
      url: "setting/addColor.php",
      data: $("#addColor").serialize(),
      dataType: "text",
      success: function (response) {
        $("#productColor").html(response);
      },
    });
  })}
  ); function deleteColor(id)
  {$(document).ready(function () {
    $.ajax({
      url: "setting/delete.php",
      type: "POST",
      data: {
        id: id,
        action: "delete",
      },
      success: function (response) {
        $("#productColor").html(response);
      },
    });
  })}
  $(document).ready(function()
  {$("#insertCategory").click(function (e) {
    e.preventDefault();
    $.ajax({
      method: "post",
      url: "setting/addCategory.php",
      data: $("#addCategory").serialize(),
      dataType: "text",
      success: function (response) {
        $("#categoryList").html(response);
      },
    });
  })}
  ); function deleteCategory(id)
  {$(document).ready(function () {
    $.ajax({
      url: "setting/delete.php",
      type: "POST",
      data: {
        id: id,
        action: "deleteCategory",
      },
      success: function (response) {
        $("#categoryList").html(response);
      },
    });
  })}
</script>;
