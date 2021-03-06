<?php

namespace SRC\Application\Repository;

class GetPlanById implements \SRC\Domain\Plan\GetPlanById
{
    private \PDO $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function find(int $planId): array
    {
        $stmt = $this->connection->prepare("SELECT
                                            `name`,
                                            duration
                                        FROM
                                            service_plan
                                        WHERE
                                            id = ?");
        $stmt->bindValue(1, $planId);
        $stmt->execute();

        return $stmt->fetch();
    }
}