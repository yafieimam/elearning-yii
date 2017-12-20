<?php
use common\models\User;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
		<?php 
		if (!Yii::$app->user->getIsGuest()) {
		?>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Welcome, <?= Yii::$app->user->identity->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
		<?php
		}
		?>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Course', 'options' => ['class' => 'header']],
                    ['label' => 'Course', 'icon' => 'book', 'url' => ['/course'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->role == 1],
					['label' => 'My Course', 'icon' => 'book', 'url' => ['/course/see'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->role == 1],
					['label' => 'Line Chatbot Integration', 'icon' => 'comment', 'url' => ['/site/linechatbot'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->role == 1],
                    ['label' => 'Course Categories', 'icon' => 'file-text-o', 'url' => ['/coursecategories'], 'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->role == 2],
                    ['label' => 'Freebies (Free Content)', 'icon' => 'tag', 'url' => ['/site/freebies'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
					['label' => 'Signup', 'url' => ['site/signup'], 'visible' => Yii::$app->user->isGuest],

				],
            ]
        ) ?>

    </section>

</aside>
