<?php
$pagesTabActive = ! isset($_GET['tab']) || $_GET['tab'] === 'pages' ? 'active' : '';
$menusTabActive = isset($_GET['tab']) && $_GET['tab'] === 'menus' ? 'active' : '';
$settingsTabActive = isset($_GET['tab']) && $_GET['tab'] === 'settings' ? 'active' : '';
?>
<div class="py-5 text-center">
    <h2><?= phpb_trans('website-manager.title') ?></h2>
</div>

<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?= e($pagesTabActive) ?>" data-toggle="tab" href="#pages"><?= phpb_trans('website-manager.pages') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= e($menusTabActive) ?>" data-toggle="tab" href="#menus"><?= phpb_trans('website-manager.menus') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= e($settingsTabActive) ?>" data-toggle="tab" href="#settings"><?= phpb_trans('website-manager.settings') ?></a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="pages" class="tab-pane <?= e($pagesTabActive) ?>">

                <h4><?= phpb_trans('website-manager.pages') ?></h4>

                <div class="main-spacing">
                    <?php
                    if (phpb_flash('message')):
                    ?>
                    <div class="alert alert-<?= phpb_flash('message-type') ?>">
                        <?= phpb_flash('message') ?>
                    </div>
                    <?php
                    endif;
                    ?>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><?= phpb_trans('website-manager.name') ?></th>
                                <th scope="col"><?= phpb_trans('website-manager.route') ?></th>
                                <th scope="col"><?= phpb_trans('website-manager.actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($pages as $page):
                                ?>
                                <tr>
                                    <td>
                                        <?= e($page->name) ?>
                                    </td>
                                    <td>
                                        <?= e($page->route) ?>
                                    </td>
                                    <td class="actions">
                                        <a href="<?= e($page->route) ?>" target="_blank" class="btn btn-light btn-sm">
                                            <span><?= phpb_trans('website-manager.view') ?></span> <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?= phpb_url('pagebuilder', ['action' => 'edit', 'page' => $page->id]) ?>" class="btn btn-primary btn-sm">
                                            <span><?= phpb_trans('website-manager.edit') ?></span> <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?route=page_settings&action=edit&page=<?= e($page->id) ?>" class="btn btn-secondary btn-sm">
                                            <span><?= phpb_trans('website-manager.settings') ?></span> <i class="fas fa-cog"></i>
                                        </a>
                                        <a href="?route=page_settings&action=destroy&page=<?= e($page->id) ?>" class="btn btn-danger btn-sm">
                                            <span><?= phpb_trans('website-manager.remove') ?></span> <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr class="mb-3">
                <a href="?route=page_settings&action=create" class="btn btn-primary btn-sm">
                    <?= phpb_trans('website-manager.add-new-page') ?>
                </a>

            </div>
            <div id="menus" class="tab-pane <?= e($menusTabActive) ?>">

                <h4 class="mb-3"><?= phpb_trans('website-manager.menus') ?></h4>

            </div>
            <div id="settings" class="tab-pane <?= e($settingsTabActive) ?>">

                <h4 class="mb-3"><?= phpb_trans('website-manager.settings') ?></h4>

                <?php
                require __DIR__ . '/settings.php';
                ?>

            </div>
        </div>
    </div>
</div>
