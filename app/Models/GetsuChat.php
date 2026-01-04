<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

/**
 * @property \App\Models\User $user
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GetsuChat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GetsuChat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GetsuChat query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GetsuChat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GetsuChat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GetsuChat whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GetsuChat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GetsuChat whereUserId($value)
 * @mixin \Eloquent
 * @mixin IdeHelperGetsuChat
 */

class GetsuChat extends Model
{
    protected $fillable = [
        'message',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
