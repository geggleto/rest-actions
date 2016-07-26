# Rest Action Classes

Template classes for JSON API

## Create Example
```php
class CreateEventAction extends CreateAction
{

    public function init()
    {
        $this->response->header('Content-Type', 'application/json');
        $this->setCreatedMessage('Created Event Successfully');

        $this->fields = [
            'campaign_id',
            'name',
            'sms_message'
        ];
    }

    /**
     * @param $attributes
     * @return Model
     */
    public function create(array $attributes)
    {
        $values = $this->parseFields($attributes);

        $obj = new CampaignEvent($values);
        $obj->save();

        return $obj;
    }
}
```

### Update Example
```php
class UpdateEventAction extends UpdateAction
{
    public function init()
    {
        $this->response->header('Content-Type', 'application/json');
        $this->setUpdatedMessage('Updated Event Successfully');

        $this->fields = [
            'event_string',
            'campaign_id',
            'name'
        ];
    }

    /**
     * @param Model $object |null
     * @param array $attributes
     *
     * @return Model
     */
    public function update(Model $object, array $attributes)
    {
        $object->update($this->parseFields($attributes));

        return $object;
    }

    public function locate($param1)
    {
        return CampaignEvent::find($param1);
    }
}

```

### Get Object
```php
class GetEventAction extends GetAction
{

    public function init()
    {
        $this->response->header('Content-Type', 'application/json');
    }

    /**
     * @param $param1
     *
     * @return Model
     */
    public function locate($param1)
    {
        return CampaignEvent::find($param1);
    }
}
```