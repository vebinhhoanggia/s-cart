<?php
#App\Plugins\Cms\ProductReview\Models\PluginModel.php
namespace App\Plugins\Cms\ProductReview\Models;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class PluginModel extends Model
{
    use \SCart\Core\Front\Models\UuidTrait;

    public $table = SC_DB_PREFIX.'product_review';
    protected $connection = SC_CONNECTION;
    protected $guarded    = [];
    public static $pointData = [];

    /**
     * [getPointProduct description]
     *
     * @param   [type]  $pId  [$pId description]
     *
     * @return  [type]        [return description]
     */
    public function getPointProduct($pId) {
        return $this->where('product_id', $pId)->where('status', 1)->get();
    }
    
    public function uninstallExtension()
    {
        $this->uninstall();

        return ['error' => 0, 'msg' => 'uninstall success'];
    }

    public function installExtension()
    {
        $this->install();
        return ['error' => 0, 'msg' => 'install success'];
    }
    

    //=========================

    public function uninstall()
    {
        if (Schema::hasTable($this->table)) {
            Schema::drop($this->table);
        }
    }

    public function install()
    {
        $this->uninstall();

        Schema::create($this->table, function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('product_id');
            $table->uuid('customer_id');
            $table->string('name', 100);
            $table->integer('point');
            $table->string('comment', 300);
            $table->integer('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Get point data of product
     *
     * @return void
     */
    public static function getPointData($pId) {
        if (!isset(self::$pointData[$pId])) {
            $pointData = self::selectRaw('count(*) as ct, sum(point) as total')
                ->where('status', 1)
                ->where('product_id', $pId)
                ->groupBy('product_id')
                ->get()
                ->first();
            self::$pointData[$pId] = empty($pointData)?'':$pointData;
        }
        return self::$pointData[$pId];
    }

    protected static function boot()
    {
        parent::boot();
        // before delete() method call this
        static::deleting(function ($model) {
            //Delete model descrition
        });

        //Uuid
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = sc_generate_id($type = 'product_review');
            }
        });
    }

}
