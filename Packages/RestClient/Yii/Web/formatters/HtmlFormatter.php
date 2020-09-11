<?php

namespace ZnBundle\RestClient\Yii\Web\formatters;

/**
 * Class HtmlFormatter
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class HtmlFormatter extends RawFormatter
{

    public function getName(): string
    {
        return 'html';
    }

}