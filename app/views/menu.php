<div class="menu-wrapper">
    <div class="page-header">
        <h2 class="page-title"><i class="fa-regular fa-calendar"></i> Weekly Menu</h2>
        <p class="page-subtitle">Your 7-day mess schedule</p>
    </div>
    <div class="menu-grid">
        <?php
        $delay_index = 0;
        foreach ($daysOrder as $day):
            if (empty($menus[$day])) continue;
            $m = $menus[$day];
            $delay_index++;
        ?>
            <div class="fine-box" style="animation-delay: <?= $delay_index * 0.05 ?>s;">
                <div class="day-header">
                    <span class="day-name"><?= htmlspecialchars($day) ?></span>
                    <i class="fa-regular fa-calendar day-icon"></i>
                </div>

                <div class="meal-content">
                    <div class="fine-meal-row">
                        <div class="fine-meal-header">
                            <span class="fine-meal-type t-breakfast"><i class="fa-solid fa-mug-hot"></i> Breakfast</span>
                            <span class="fine-meal-time"><?= date('h:i A', strtotime($m['breakfast_start_time'])) ?> - <?= date('h:i A', strtotime($m['breakfast_end_time'])) ?></span>
                        </div>
                        <p class="fine-meal-items"><?= htmlspecialchars($m['breakfast']) ?></p>
                    </div>

                    <div class="fine-meal-row">
                        <div class="fine-meal-header">
                            <span class="fine-meal-type t-lunch"><i class="fa-solid fa-bowl-food"></i> Lunch</span>
                            <span class="fine-meal-time"><?= date('h:i A', strtotime($m['lunch_start_time'])) ?> - <?= date('h:i A', strtotime($m['lunch_end_time'])) ?></span>
                        </div>
                        <p class="fine-meal-items"><?= htmlspecialchars($m['lunch']) ?></p>
                    </div>

                    <div class="fine-meal-row" style="border-bottom: none; padding-bottom: 0;">
                        <div class="fine-meal-header">
                            <span class="fine-meal-type t-dinner"><i class="fa-solid fa-moon"></i> Dinner</span>
                            <span class="fine-meal-time"><?= date('h:i A', strtotime($m['dinner_start_time'])) ?> - <?= date('h:i A', strtotime($m['dinner_end_time'])) ?></span>
                        </div>
                        <p class="fine-meal-items"><?= htmlspecialchars($m['dinner']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>