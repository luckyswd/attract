<?php

/*
Title: Тарифы на планы
Mode: preview
*/

?>

<?php
$title = get_field('title');
$plans = get_field('plans');
?>

<?php if (!is_admin()) : ?>
    <section class="plans-section distance">
        <div class="container">
            <div class="section__title h2"><?= $title ?></div>
            <?php if (!empty($plans)) : ?>
            <div class="plans-section__period">
                <button data-period="month" class="active">Ежемесячно</button>
                <button data-period="year">Ежегодно</button>
            </div>
            <div class="plan-cards">
                <?php foreach ($plans as $key => $plan) : ?>
                <?php
                    $cost = $plan['cost'];
                    $start_users = '';
                    $start_price = '';
                    $percent_for_year = 0;
                    if(count($cost['for_users_count']) > 0) {
                        $start_users = $cost['for_users_count'][0]['number'];
                        $start_price = $cost['for_users_count'][0]['price'];
                        $percent_for_year = $cost['for_users_count'][0]['percent_sale_for_year'];
                    }
                ?>
                <div class="plan-card <?= $plan['inverse'] ? 'plan-card_invers' : '' ?>">
                    <input data-plan-year-sale-val type="hidden" value="<?= $percent_for_year ?>">
                    <input data-plan-price-val type="hidden" value="<?= $start_price ?>">
                    <input data-plan-users-val type="hidden" value="<?= $start_users ?>">
                    <div class="plan-card__hero" style="background-image: url(<?= $plan['bg'] ?>);">
                        <div class="plan-card__number text-2">(<?= str_pad(($key + 1), 2, "0", STR_PAD_LEFT) ?>)</div>
                        <div class="plan-card__title text-3"><?= $plan['name'] ?></div>
                    </div>
                    <div class="plan-card__content">
                        <div class="plan-card__prices"><div class="plan-card__price text-4"><span data-plan-price><?= $start_price ?></span> zł</div></div>
                        <div class="plan-card__users text-3">
                            <?php if(count($cost['for_users_count']) > 1): ?>
                                <label for="">
                                    <select data-users-select class="text-3">
                                        <?php foreach ($cost['for_users_count'] as $option): ?>
                                            <option value="<?= $option['price'] ?>" data-users="<?= $option['number'] ?>" data-year-sale-percent="<?= $option['percent_sale_for_year'] ?>" >охватывает <?= $option['number'] ?> пользователей</option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                            <?php else: ?>
                                <p>охватывает <?= $start_users ?> пользователей</p>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty($plan['link'])): ?>
                            <?php $link = $plan['link']; ?>
                            <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="plan-card__link btn blue"><span class="hover-animation">
                                                <span><?php echo $link['title'] ?></span>
                                            </span></a>
                        <?php endif; ?>
                        <div class="plan-card__characteristics">
                            <div class="plan-card__characteristic text-4"><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.279.129a1.443 1.443 0 0 1 1.192 0l5.945 2.666a.777.777 0 0 1 0 1.416L8.47 6.87a1.452 1.452 0 0 1-1.192 0L1.334 4.208a.777.777 0 0 1 0-1.416L7.28.129Zm.596.746a.57.57 0 0 0-.24.052L1.894 3.5l5.742 2.573a.604.604 0 0 0 .24.052.56.56 0 0 0 .241-.052L13.86 3.5 8.119.927a.59.59 0 0 0-.243-.052Zm-6.54 8.917 1.254-.563 1.07.478-1.764.793 5.742 2.573a.602.602 0 0 0 .24.052.56.56 0 0 0 .241-.052L13.86 10.5l-1.763-.79 1.069-.479 1.255.564a.777.777 0 0 1 0 1.416l-5.95 2.66a1.453 1.453 0 0 1-1.192 0l-5.945-2.663a.777.777 0 0 1 0-1.416Zm1.254-4.063 1.07.478L1.895 7l5.742 2.573a.604.604 0 0 0 .24.052.56.56 0 0 0 .241-.052L13.86 7l-1.763-.79 1.069-.479 1.255.564a.777.777 0 0 1 0 1.416l-5.95 2.66a1.453 1.453 0 0 1-1.192 0L1.334 7.708a.777.777 0 0 1 0-1.416l1.255-.563Z" fill="<?= $plan['inverse'] ? '#ffffff' : '#1744D0' ?>"/></svg><span><?= $plan['nemory'] ?></span></div>
                            <div class="plan-card__characteristic text-4"><svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm0 7a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm1.428 2.5H5.572C3.072 10.5 1.04 12.51 1 15h12a4.571 4.571 0 0 0-4.572-4.5Zm0-1A5.57 5.57 0 0 1 14 15.072a.928.928 0 0 1-.928.928H.928A.928.928 0 0 1 0 15.072 5.57 5.57 0 0 1 5.572 9.5h2.856Z" fill="<?= $plan['inverse'] ? '#ffffff' : '#1744D0' ?>"/></svg><span data-plan-users-count><?= $start_users ?></span> пользователей</div>
                            <hr/>
                            <?php foreach ($plan['characteristics'] as $key => $characteristic) : ?>
                            <div class="plan-card__characteristic text-4">
                                <span class="plan-card__characteristic-grade">
                                    <?php for($i = 0; $i < $characteristic['grade']; $i++): ?>
                                        <span></span>
                                    <?php endfor; ?>
                                </span>
                                <?= $characteristic['name'] ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
<?php else : ?>
    <h2 style="font-family: 'Mark', sans-serif;">Тарифы на планы</h2>
<?php endif; ?>