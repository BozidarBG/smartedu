<?php

namespace App\Core\Database;

use PDO;
use App\core\HelpTrait;


class QueryBuilder
{

    use HelpTrait;

    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;


    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     * @param $table
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;

    }


    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

//    /**
//     * The PDO instance.
//     *
//     * @var PDO
//     * @method prepare
//     */
//    public static function selectAllStatic()
//    {
//        //$obj=new self(App::get('database'));
//
//        //var_dump(self::$table);exit;
//
//        $statement =self::$pdos->prepare("select * from {self::$table}");
//        //var_dump($statement);exit;
//        $statement->execute();
//
//        return $statement->fetchAll(PDO::FETCH_CLASS);
//    }

    public function getPdo(){
        return $this->pdo;
    }

    public function selectOne($table, $id){
        $sql=sprintf("select * from %s where id=%s limit 1",
            $table,
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute();
            return $statement->fetchObject();
        }catch (Exception $e){
            die('Woops, something went wrong!');
        }


    }

    /**
     * Insert a record into a table.
     *
     * @param  string $table
     * @param  array  $parameters
     */
    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (\Exception $e) {
            //
        }
    }

    public function update($table, $parameters, $id){
        //check if provided id is an integer
        if(!$this->checkIfInteger($id)){
            $this->redirectBack();
        }
        $keys_arr= array_keys($parameters);
        //$keys_arr_colon=':'. implode(', :', array_keys($parameters));
        $insert_string='';
        for($i=0; $i<count($keys_arr); $i++){
            $insert_string .=$keys_arr[$i].'=:'.$keys_arr[$i];
            if($i<count($keys_arr)-1){
                $insert_string .=', ';
            }
        }

        //["name"]=> "Božidar", ["prob"]=> "proba"

        /*
         * UPDATE Customers SET ContactName = 'Alfred Schmidt', City= 'Frankfurt' WHERE CustomerID = 1;*/
        $sql=sprintf('update %s set %s where id='.$id,
            $table,
            //array_key = :placehoder i.e. name=:name
            $insert_string
        );
        //die($sql);
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        }catch (Exception $e){
            die('Woops, something went wrong!');
        }
    }



    public function delete($table, $id){
        //check if provided id is an integer
        if(!$this->checkIfInteger($id)){
            $this->redirectBack();
        }
        $sql=sprintf('delete from %s where id='.$id,
            $table

        );
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute();
        }catch (Exception $e){
            die('Woops, something went wrong!');
        }
    }


}
