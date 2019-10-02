<div class="container">
    <div class="columns text-center">
        <div class="column col-8 col-mx-auto nice-bg" style="margin: 50px;">
            <form action="/">
            <div class="columns" style="padding: 20px;">

                <?php // Search ?>
                <div class="column col-4">
                    <div class="form-group">
                        <input
                            class="form-input"
                            name="q"
                            value="<?php echo input('q') ?>"
                            type="text"
                            placeholder="Search">
                    </div>
                </div>

                <?php // Locations ?>
                <div class="column col-4">
                    <div class="form-group">
                        <select class="form-select" name="location">
                            <option value="">All Locations</option>
                            <?php foreach (App\Location::all() as $location) : ?>
                                <option value="<?php echo $location->id() ?>"
                                    <?php echo $location->id() == input('location') ? 'selected' : ''?>>
                                    <?php echo $location->location_name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <?php // Arrive date ?>
                <div class="column col-4">
                    <div class="form-group">
                        <input class="form-input"
                               type="date"
                               value="<?php echo input('arrive', '2019-10-02') ?>"
                               name="arrive">
                    </div>
                </div>

                <?php // Near the beach ?>
                <div class="column col-2 p-0">
                    <div class="form-group text-left">
                        <label class="form-checkbox">
                            <input type="checkbox" name="nb" <?php echo input('nb') == 'on' ? 'checked' : '' ?>>
                            <i class="form-icon"></i> Near beach
                        </label>
                    </div>
                </div>

                <?php // Allow Pets ?>
                <div class="column col-2 p-0">
                    <div class="form-group text-left">
                        <label class="form-checkbox">
                            <input type="checkbox" name="pet" <?php echo input('pet') == 'on' ? 'checked' : '' ?>>
                            <i class="form-icon"></i> Allow Pets
                        </label>
                    </div>
                </div>

                <?php // Sleeps ?>
                <div class="column col-2">
                    <div class="form-group text-left">
                        <select class="form-select" name="sleeps">
                            <option value="">Sleeps</option>
                            <?php foreach (range(1, 10) as $sleep) : ?>
                                <option value="<?php echo $sleep ?>"
                                    <?php echo $sleep == input('sleeps') ? 'selected' : ''?>>
                                    <?php echo $sleep ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <?php // Beds ?>
                <div class="column col-2">
                    <div class="form-group text-left">
                        <select class="form-select" name="beds">
                            <option value="">Beds</option>
                            <?php foreach (range(1, 10) as $bed) : ?>
                                <option value="<?php echo $bed ?>"
                                    <?php echo $bed == input('beds') ? 'selected' : ''?>>
                                    <?php echo $bed ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <?php // Depart date ?>
                <div class="column col-4">
                    <div class="form-group">
                        <input class="form-input"
                               type="date"
                               value="<?php echo input('depart', '2019-10-06') ?>"
                               name="depart">
                    </div>
                </div>

                <?php // Search ?>
                <div class="column col-4 text-left">
                    <button class="btn btn-primary input-group-btn">Submit</button>
                    <a href="/" class="btn">Reset</a>
                </div>
            </div>
            </form>

        </div>
        <div class="column col-1">

        </div>
    </div>
</div>