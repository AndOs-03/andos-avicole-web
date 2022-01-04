<!-- FOOTER-->
<footer class="main-footer">
  <strong>Copyright &copy; AndOs 2022 <a href="https://kaspycorporation.com">andosthedark.com</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>AndOs Avicole - V1</b> - Build 1.0
  </div>
</footer>

<script type="text/javascript">
  $(function () {
    var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
      return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
      return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
    .css({'display': 'block'})
    .addClass('menu-open').prev('a')
    .addClass('active');
  });
</script>