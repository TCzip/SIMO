<script type="text/javascript">
  window.onload = function(){
    getGroups();
  }
</script>
<div class="content">
  <div class="form-signin center well">
    <form class="form_CONTROL" method="post">
      <div class="table-responsive" name="groups" id="groups">
      </div>
      <?php echo validation_errors(); ?>
      <div class="form-group center">
        <input type="text" size="5" name="group" id="group" value="" pattern="[A-Z,a-z]{1}" title="Somente uma letra!">
        <label for=""></label>
        <input class="btn btn-sm btn-primary" type="submit" name="button" value="Adicionar" onclick='addGroup($(group).val())'></button>
      </div>
    </form>
    </div>
</div>
