<?php
namespace ZendPress\Entity;

/**
 * Class Post
 * @package ZendPress\Entity
 */
class Post extends BaseEntity
{
    static $API_ENDPOINT = '/posts';

    public $id;
    public $title;
    public $status;
    public $type;
    public $author;
    public $date;
    public $date_gmt;
    public $modified;
    public $modified_gmt;
    public $modified_tz;
    public $slug;
    public $password;
    public $content;
    public $excerpt;
    public $parent;
    public $link;
    public $guid;
    public $menu_order;
    public $comment_status;
    public $ping_status;
    public $sticky;
    public $post_thumbnail;
    public $format;
    public $terms;
    public $meta;
    // Edit context
    public $content_raw;
    public $excerpt_raw;


    public function getArrayCopy()
    {
        throw new \Exception(__METHOD__.' was not implemented yet');
    }

    public function exchangeArray(array $array)
    {
        foreach ($array as $entityAttribute => $entityValue) {
            if ($entityAttribute === 'ID') {
                $this->id = $entityValue;
            }
            if ($entityAttribute === 'author') {
                $this->author = new Author($array['author']);
                continue;
            }
            if ($entityAttribute === 'post_thumbnail') {
                $this->post_thumbnail = new Media($array['post_thumbnail']);
                continue;
            }
            $this->$entityAttribute = $entityValue;
        }
    }

    public function toArray()
    {
        throw new \Exception(__METHOD__.' was not implemented yet');
    }

    public function getApiEndPoint()
    {
        return $this::$API_ENDPOINT;
    }
}