namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{

protected $table='messages';

protected $allowedFields=[
'sender_id',
'receiver_id',
'message',
'file',
'type'
];

}