<?php


namespace Tests\Unit\Repository;


use App\DB\Connection;
use App\Dto\InternalLinkDto;
use App\Repository\InternalLinksRepositoryImpl;
use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;

class InternalLinksRepositoryTest extends TestCase
{
    private $repository;

    protected function setUp()
    {
        $this->repository = new InternalLinksRepositoryImpl();
    }

    public function testFindAll()
    {
        $query = 'SELECT * FROM internal_links';

        // Create a mock PDOStatement
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->expects($this->once())
            ->method('fetchAll')
            ->willReturn(['link1', 'link2']);

        // Create a mock PDO
        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())
            ->method('prepare')
            ->with($query)
            ->willReturn($statementMock);

        // Create a mock Connection
        $connectionMock = $this->createMock(Connection::class);
        $connectionMock->expects($this->once())
            ->method('connection')
            ->willReturn($pdoMock);

        $this->repository->setConnection($connectionMock);

        $this->repository->findAll();
    }

    public function test_save()
    {
        $query     = 'INSERT INTO internal_links (source_url, target_url) VALUES (?,?)';
        // Create a mock InternalLinkDto
        $dataMock = $this->createMock(InternalLinkDto::class);
        $dataMock->expects($this->once())
            ->method('getSourceUrl')
            ->willReturn('http://127.0.0.1:8000/login');
        $dataMock->expects($this->once())
            ->method('getTargetUrl')
            ->willReturn('http://127.0.0.1:8000/login');

        // Create a mock PDOStatement
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->expects($this->once())
            ->method('execute')
            ->with(['http://127.0.0.1:8000/login', 'http://127.0.0.1:8000/login']);

        // Create a mock PDO
        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())
            ->method('prepare')
            ->with($query)
            ->willReturn($statementMock);

        // Create a mock Connection
        $connectionMock = $this->createMock(Connection::class);
        $connectionMock->expects($this->once())
            ->method('connection')
            ->willReturn($pdoMock);

        $this->repository->setConnection($connectionMock);

        $this->repository->save($dataMock);
    }

    public function test_delete_all()
    {
        $query     = 'DELETE FROM internal_links';

        // Create a mock PDOStatement
        $statementMock = $this->createMock(PDOStatement::class);
        $statementMock->expects($this->once())
            ->method('execute');

        //create a mock PDO
        $pdoMock = $this->createMock(PDO::class);
        $pdoMock->expects($this->once())
            ->method('prepare')
            ->with($query)
            ->willReturn($statementMock);

        // Create a mock Connection
        $connectionMock = $this->createMock(Connection::class);
        $connectionMock->expects($this->once())
            ->method('connection')
            ->willReturn($pdoMock);

        $this->repository->setConnection($connectionMock);
        
        $this->repository->deleteAll();
    }
}
