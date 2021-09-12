1.去重留下最新记录  排序

    注：  DISTINCT(只能目标字段，必须放在开头)  去除最新留下之前的
          group by  去重 留下最之前的一条数据
    
    left join  on    t1.id<t2.id  where t2.id is NUll
    利用left join  不能满足条件  null 去重最新 
    