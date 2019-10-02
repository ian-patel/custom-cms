<div class="container">
    <?php $properties = App\Property::filter(); ?>

    <?php if (count($properties['data']) > 0) : ?>
    <div class="columns">
        <?php foreach ($properties['data'] as $property) :  ?>
        <div class="column col-4 col-xs-12">
            <div class="card">

                <?php // Image ?>
                <div class="card-image">
                    <img class="img-responsive" src="https://placeimg.com/640/480/nature" alt="">
                </div>

                <?php // Title ?>
                <div class="card-header">
                    <div class="card-title h5"><?php echo $property->property_name ?></div>
                    <div class="card-subtitle text-gray"><?php echo $property->location()->location_name ?></div>
                </div>

                <?php // Body ?>
                <div class="card-body">
                    <?php if ($property->near_beach) : ?>
                        <span class="chip">Near Beach</span>
                    <?php endif; ?>

                    <?php if ($property->accepts_pets) : ?>
                        <span class="chip">Pets </span>
                    <?php endif; ?>

                    <?php if ($property->sleeps) : ?>
                        <span class="chip">
                            <figure class="avatar avatar-sm" data-initial="<?php echo $property->sleeps ?>" style="background-color: #5755d9;"></figure>
                            Sleeps
                        </span>
                    <?php endif; ?>

                    <?php if ($property->beds) : ?>
                        <span class="chip">
                            <figure class="avatar avatar-sm" data-initial="<?php echo $property->beds ?>" style="background-color: #5755d9;"></figure>
                            Beds
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <ul class="pagination">
        <li class="page-item <?php echo input('page', 1) == 1 ? 'disabled' : '' ?>">
            <a href="<?php echo '?' . $properties['links']['previous'] ?>" tabindex="-1">Previous</a>
        </li>
        <li class="page-item <?php echo !$properties['hasMore'] ? 'disabled' : '' ?> ">
            <a href="<?php echo '?' . $properties['links']['next'] ?>">Next</a>
        </li>
    </ul>

    <?php else : ?>
        <?php render('not-found') ?>
    <?php endif; ?>
</div>

<?php