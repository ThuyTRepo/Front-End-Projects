import React, { useEffect, useState } from 'react';
import axios from 'axios';

const UnitsPage = () => {
  const [units, setUnits] = useState([]);

  useEffect(() => {
    const fetchUnits = async () => {
      try {
        const response = await axios.get('http://localhost:8080/api/v1/units');
        const unitsData = response.data.data.items;
        setUnits(unitsData);
      } catch (error) {
        console.error(error);
      }
    };

    fetchUnits();
  }, []);

  return (
    <div>
      <h1>Units</h1>
      {units.map((unit) => (
        <div key={unit.id}>
          <h3>{unit.name}</h3>
          <p>Code: {unit.code}</p>
          <p>Semester: {unit.semester}</p>
          <p>Number of Students: {unit.numStudents}</p>
        </div>
      ))}
    </div>
  );
};

export default UnitsPage;
