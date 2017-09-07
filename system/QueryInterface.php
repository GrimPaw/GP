<?php
namespace Engine;


interface QueryInterface
{
	/*
	 * Часть запроса query "WHERE"
	 *
	 * @param string|array
	 * @return $this - возвращает объект
	 */
	public function where($param);

	/*
	 * Часть запроса query "ORDER BY"
	 *
	 * @param string
	 * @return $this - возвращает объект
	 */
	public function orderBy($param);
}