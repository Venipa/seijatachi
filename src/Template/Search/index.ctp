<?= $this->Html->image('seijatachi.png', ['alt' => 'Seijatachi', 'class' => 'img-responsive', 'id' => 'logo', 'url' => '/']); ?>

<hr />

<?= $this->Form->create('anime', ['class' => 'form-inline text-center']) ?>
<div class="form-group">
    <?= $this->Form->text('anime', ['class' => 'form-control', 'placeholder' => 'e.g. Toradora!']) ?>
</div>
<?= $this->Form->button('Search', ['type' => 'submit', 'class' => 'btn btn-default']) ?>
<?= $this->Form->end() ?>

<hr />

<?php
if(!empty($this->request->data)) {
    if (!empty($animes)) {
        foreach ($animes->entry as $anime) { ?>
            <div class="row panel panel-default panel-body ani-panel">
                <div class="col-md-4 ani-image">
                    <?= $this->Html->image($anime->image, ['alt' => $anime->title, 'class' => 'img-thumbnail img-responsive']) ?>
                </div>
                <div class="col-md-8">
                    <div>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="information<?= $anime->id ?>">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    <tr>
                                        <td>Title</td>
                                        <td><?= $anime->title.((!empty($anime->english) && strcmp($anime->english, $anime->title)) ? (' (' . $anime->english . ')') : (null)) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Synonyms</td>
                                        <td><?= ((!empty($anime->synonyms)) ? ($anime->synonyms) : ('Uninformed')) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Episodes</td>
                                        <td><?= $anime->episodes ?></td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td><?= $anime->type ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><?= $anime->status ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td><?= $anime->start_date ?> to <?= $anime->end_date ?></td>
                                    </tr>
                                    <tr>
                                        <td>Score</td>
                                        <td><?= $anime->score ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="synopsis<?= $anime->id ?>">
                                <div style="min-height: 280px;">
                                    <?= $anime->synopsis ?>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#information<?= $anime->id ?>" aria-controls="information" role="tab" data-toggle="tab">Information</a>
                            </li>
                            <li role="presentation">
                                <a href="#synopsis<?= $anime->id ?>" aria-controls="synopsis" role="tab" data-toggle="tab">Synopsis</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php }
    } else {
        echo '<div class="alert alert-info text-center" role="alert">We could not find anything in your search!</div>';
    }
} else {
    echo '<div class="alert alert-info text-center" role="alert">Enter a anime to conduct the search!</div>';
} ?>