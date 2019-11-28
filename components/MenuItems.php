<?php

namespace app\components;

use app\models\Category;


class MenuItems
{
    const TEMPLATE = '<a href="{url}" class="dropdown-toggle" data-toggle="dropdown">{label} <span class="caret"></span></a>';
    const SUB_MENU_TEMPLATE = "\n<ul class='dropdown-menu' role='menu'>\n{items}\n</ul>\n";

    public static function get()
    {
        $categories = Category::find()->where([
            'status' => Category::STATUS_ACTIVE,
            'parent_id' => Category::MAIN_PARENT,
        ])->orderBy(['position' => SORT_ASC])->all();

        $items = [
            'items' => [],
            'options' => [
                'class' => 'nav navbar-nav navbar-right',
                'id' => 'navbar-id',
            ],
            'submenuTemplate' => self::SUB_MENU_TEMPLATE,
        ];

        foreach ($categories as $category) {

            /* @var $category Category */
            if ($category->children) {

                $dropdown = [];

                foreach ($category->children as $child) {
                    $dropdown[] = ['label' => $child->name, 'url' => ['#']];
                }

                $items['items'][] = [
                    'label' => $category->name,
                    'url' => ['#'],
                    'options' => ['class' => 'dropdown'],
                    'template' => self::TEMPLATE,
                    'items' => $dropdown,
                ];
            } else {
                $items['items'][] = ['label' => $category->name, 'url' => ['#']];
            }

        }

        return $items;
    }
}