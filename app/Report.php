<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guid',
        'title',
        'description',
        'address',
        'city',
        'image',
        'type',
        'is_visible',
        'report_at',
    ];

    /**
     * @var array
     */
    protected $dates = ['report_at'];

    public function __construct(array $attributes = [])
    {
        $default = [
            'report_at' => Carbon::now(),
        ];

        parent::__construct(array_merge($default, $attributes));
    }

    /**
     * Get all of the report's files.
     */
    public function files()
    {
        return $this->morphMany('App\File', 'file');
    }

    /**
     * Returns the title as a slug
     *
     * @return string
     */
    public function getSlugAttribute()
    {
        return str_slug($this->title);
    }

    /**
     * Returns the address encoded for the Google Maps Static Map link
     *
     * @return string
     */
    public function getAddressEncodedAttribute()
    {
        $address = [
            $this->address,
            $this->city,
            'Netherlands',
        ];

        return urlencode(implode(' ' , $address));
    }

    /**
     * Returns the unique identifier for this report
     *
     * @return string
     */
    public function generateGuid()
    {
        return md5($this->title . ' ' . $this->report_at->format('Y-m-d'));
    }

    /**
     * Returns the url to the detail page
     *
     * @return string
     */
    public function getPathAttribute()
    {
        return route('report.show', [$this->report_at->format('Y-m-d'), $this->id, $this->slug]);
    }

    /**
     * Returns true when the report is hidden
     *
     * @return bool
     */
    public function getIsHiddenAttribute()
    {
        return !$this->is_visible;
    }

    /**
     * Returns an array with the different years
     * in which reports have been created
     *
     * @return array
     */
    public static function getDistinctYears()
    {
        return DB::table('reports')
            ->select(DB::raw('YEAR(report_at) AS year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->get()
            ->pluck('year');
    }
}
