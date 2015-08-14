<?php

namespace LoLApi\Api;

/**
 * Class MatchListApi
 *
 * @package LoLApi\Api
 */
class MatchListApi extends BaseApi
{
    const API_URL_MATCH_LIST_BY_SUMMONER_ID = '/api/lol/{region}/v2.2/matchlist/by-summoner/{summonerId}';

    /**
     * @param int   $summonerId
     * @param array $championIds
     * @param array $rankedQueues
     * @param array $seasons
     * @param int   $beginTime
     * @param int   $endTime
     * @param int   $beginIndex
     * @param int   $endIndex
     *
     * @return array
     */
    public function getMatchListBySummonerId($summonerId, $championIds = [], $rankedQueues = [], $seasons = [], $beginTime = null, $endTime = null, $beginIndex = null, $endIndex = null)
    {
        $url             = str_replace('{summonerId}', $summonerId, self::API_URL_MATCH_LIST_BY_SUMMONER_ID);
        $queryParameters = [];

        $queryParameters['championIds']  = implode(',', $championIds);
        $queryParameters['rankedQueues'] = implode(',', $rankedQueues);
        $queryParameters['seasons']      = implode(',', $seasons);
        $queryParameters['beginTime']    = $beginTime;
        $queryParameters['endTime']      = $endTime;
        $queryParameters['beginIndex']   = $beginIndex;
        $queryParameters['endIndex']     = $endIndex;

        return $this->callApiUrl($url, array_filter($queryParameters));
    }
}
