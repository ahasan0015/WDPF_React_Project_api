export interface Airport {
  airportId: number,
  airportName: string,
  city?: string,
  country?: string,
}

const airportDefault: Airport = {
  airportId: 0,
  airportName: "",
  city: "",
  country: "",
};

export default airportDefault;
