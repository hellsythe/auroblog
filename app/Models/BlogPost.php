<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class BlogPost extends Model
{
    CONST ATTRIBUTES = [
        'title' => 'Título',
        'content' => 'Contenido',
        'preview' => 'Vista previa',
        'created_at' => 'Fecha de creación',
    ];

    CONST RULES = [
        'title' => 'required|min:3',
        'content' => 'required',
    ];

    public static function getLabel(string $label) : string
    {
        return Self::ATTRIBUTES[$label]??ucwords(str_replace('_', ' ', $label));
    }

    /**
     * [generateSlug description]
     * @param  string $string [description]
     * @return string         [description]
     */
    private function generateSlug(string $string) : string
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        $posts = Self::where('title', $this->title)->count();

        if($posts === 0){
            return $slug;
        }

        return $slug . '-' . $posts;
    }

    public function save(array $options = [])
    {
        if (empty($this->id) or $this->isDirty('title')) {
            $this->slug = $this->generateSlug($this->title);
        }

        if (empty($this->id) or $this->isDirty('content')) {
            $this->content_md = Markdown::convertToHtml($this->content);
        }

        parent::save($options);
    }

    /**
     * Get the preview of BlogPost content
     *
     * @return string
     */
    public function getPreviewAttribute() : string
    {
        /**
         * para no hacer todo este proceso podria ser mejor usar un nuevo campo en la tabla
         */
        return substr(htmlspecialchars_decode(strip_tags($this->content_md)), 0, 300);
    }

}
