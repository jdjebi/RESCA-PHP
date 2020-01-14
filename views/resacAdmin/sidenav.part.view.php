<ul class="sidebar navbar-nav">
  <li class="nav-item <?= is_current_page("index") ?>">
    <a class="nav-link" href="<?= get_url("resacAdmin") ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Acceuil</span>
    </a>
  </li>
  <li class="nav-item <?= is_current_page("bilan") ?>">
    <a class="nav-link" href="<?= get_url("resacAdmin/bilan.php") ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Bilan</span></a>
  </li>
  <li class="nav-item <?= is_current_page("suggestion") ?>">
    <a class="nav-link" href="<?= get_url("resacAdmin/suggestion.php") ?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Suggestion</span></a>
  </li>
</ul>