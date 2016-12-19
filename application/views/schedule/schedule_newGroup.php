<div class="content">
  <div class="form-signin center well">
    <form class="form_CONTROL" method="post">
      <div class="form-group center">
        <input type="text" size="5" name="group" id="group" value="" pattern="[A-Z]{1}" title="Somente uma letra!">
        <label for=""></label>
        <input class="btn btn-sm btn-primary" type="submit" name="button" value="Adicionar" onclick='addGroup($(group).val())'></button>
      </div>
    </form>
    <div class="table-responsive" name="groups" id="groups">
    </div>
    </div>
</div>
