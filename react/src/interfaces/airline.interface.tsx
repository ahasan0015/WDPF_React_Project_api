export interface Airline {
  airlineId: number,
  airlineName: string,
  country?: string,
}

const airlineDefault: Airline = {
  airlineId: 0,
  airlineName: "",
  country: "",
};

export default airlineDefault;
